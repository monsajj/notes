<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site\Notes\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * @var Note
     */
    private $note;

    /**
     * NoteController constructor.
     * @param Note $note
     */
    public function __construct(Note $note)
    {
        $this->note = $note;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = $this->note->getNotesByUserId();

        return view('notes.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.note-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->note->fill($request->toArray());
        $this->note->file_id = 1;
        $this->note->slug = 'name-' . $request->title;
        $this->note->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = $this->note->with(['file'])->findOrFail($id);

        return view('notes.note-show' , ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = $this->note->findOrFail($id);

        return view('notes.note-update' , ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->note = $this->note->find($id)->fill($request->toArray());
        $this->note->user_id = Auth::id();
        $this->note->file_id = 1;
        $this->note->slug = 'name-' . $request->title;
        $this->note->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete($id)
    {
        $this->note->destroy($id);

        return redirect('/');
    }
}

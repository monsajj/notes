<?php

namespace App\Http\Controllers;

use App\Site\Files\File;
use Illuminate\Http\Request;
use App\Site\Notes\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class NoteController extends Controller
{
    /**
     * @var Note
     */
    private $note;

    /**
     * @var File
     */
    private $file;

    /**
     * NoteController constructor.
     * @param Note $note
     * @param File $file
     */
    public function __construct(Note $note, File $file)
    {
        $this->file = $file;
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
        if($request->user_id != Auth::id())
        {
            return redirect('/');
        }
        if($request->file('image'))
        {
            $downloadedFile = $request->file('image');
            $this->file->saveFile($downloadedFile);
            $this->note->file_id = $this->file->id;
        }

        $this->note->fill($request->toArray());
        $this->note->deathdate = Carbon::now()->addDay($this->note->lifetime)->format('Y-m-d H:i:s');
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
        if($note->user_id != Auth::id())
        {
            return redirect('/');
        }

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
        $note = $this->note->alive()->findOrFail($id);
        if($note->user_id != Auth::id())
        {
            return redirect('/');
        }

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
        $note = $this->note->find($id)->fill($request->toArray());
        if($note->user_id != Auth::id())
        {
            return redirect('/');
        }
        $note->user_id = Auth::id(); //Переместить!!! это тут только временно!!!!!!!!!!!!!!!!!!!!!!!!!!
        $note->slug = 'name-' . $request->title;
        $oldFileId = null;
        if($request->file('image'))
        {
            $oldFileId = $note->file_id;
            $downloadedFile = $request->file('image');
            $this->file->saveFile($downloadedFile);
            $note->file_id = $this->file->id;
        }
        if($request->lifetime)
        {
            $note->deathdate = Carbon::now()->addDay($request->lifetime)->format('Y-m-d H:i:s');
        }
        $note->save();
        if($oldFileId)
        {
            $this->file->deleteFileById($oldFileId);
        }

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
        $note = $this->note->with(['file'])->findOrFail($id);
        if($note->user_id != Auth::id())
        {
            return redirect('/');
        }
        $fileId = null;
        if($note->file)
        {
            $fileId = $note->file->id;
        }
        $this->note->destroy($id);
        if($fileId)
        {
            $this->file->deleteFileById($fileId);
        }

        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function makePublic($id)
    {
        $this->note = $this->note->find($id);
        $this->note->public = 1;
        $this->note->save();

        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function makePrivate($id)
    {
        $this->note = $this->note->find($id);
        $this->note->public = 0;
        $this->note->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPublic($id)
    {
        $note = $this->note->with(['file'])->findOrFail($id);
        if(!$note->public)
        {
            return view('notes.permission-denied');
        }

        return view('notes.note-show' , ['note' => $note]);
    }
}

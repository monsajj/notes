<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNote;
use App\Site\Files\File;
use App\Site\Notes\Note;

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
     * @param  StoreNote  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNote $request)
    {
        if(!$this->note->checkUser($request->user_id))
        {

            return redirect('/');
        }
        $this->file->saveFile($request->file('image'));
        $this->note->fill($request->toArray());
        $this->note->file_id = $this->file->id;
        $this->note->setDeathdate($this->note->lifetime);
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
        if(!$this->note->checkUser($note->user_id))
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
        if(!$this->note->checkUser($note->user_id))
        {

            return redirect('/');
        }

        return view('notes.note-update' , ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreNote  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNote $request, $id)
    {
        $note = $this->note->find($id)->fill($request->toArray());
        if(!$this->note->checkUser($note->user_id))
        {

            return redirect('/');
        }
        $oldFileId = null;
        if($request->file('image'))
        {
            $oldFileId = $note->file_id;
            $downloadedFile = $request->file('image');
            $this->file->saveFile($downloadedFile);
            $note->file_id = $this->file->id;
        }
        $note->setDeathdate($request->lifetime);
        $note->save();
        $this->file->deleteFileById($oldFileId);

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
        if(!$this->note->checkUser($note->user_id))
        {

            return redirect('/');
        }
        $fileId = $this->note->getFileId($note->file);
        $this->note->destroy($id);
        $this->file->deleteFileById($fileId);

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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNote;
use App\Site\Files\File;
use App\Site\Notes\Note;
use Illuminate\Support\Facades\Auth;
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
        //Получаю коллекцию заметок по текущему пользователю, срок жизин которых ещё не истек, отсортированных по дате изменения
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
        //Перенаправление на главную страницу если НЕ владелец заметки пытается сохранить заметку под чужим id
        if(!$this->note->checkUser($request->user_id))
        {

            return redirect('/');
        }
        //При наличии файла в Request-е сохраняю файл и получаю его id для таблицы заметок
        if($request->file('image'))
        {
            $downloadedFile = $request->file('image');
            $this->file->saveFile($downloadedFile);
            $this->note->file_id = $this->file->id;
        }
        //Заполняю оставшиеся поля заметки в базе
        $this->note->fill($request->toArray());
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
        //Перенаправление на главную страницу если НЕ владелец заметки пытается просмотреть её
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
        //Перенаправление на главную страницу если НЕ владелец заметки пытается изменить заметку под чужим id
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
        //Перенаправление на главную страницу если НЕ владелец заметки пытается сохранить заметку под чужим id
        if(!$this->note->checkUser($note->user_id))
        {

            return redirect('/');
        }
        //При наличии загружаемого файла - запоминаю id старого и сохраняю новый
        $oldFileId = null;
        if($request->file('image'))
        {
            $oldFileId = $note->file_id;
            $downloadedFile = $request->file('image');
            $this->file->saveFile($downloadedFile);
            $note->file_id = $this->file->id;
        }
        //Сохраняю изменения в заметке
        $note->setDeathdate($request->lifetime);
        $note->save();
        //Удаляю  старый файл по id
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
        //Перенаправление на главную страницу если НЕ владелец заметки пытается её удалить
        if(!$this->note->checkUser($note->user_id))
        {

            return redirect('/');
        }
        //Запоминаю id файла при наличии и удаляю заметку
        $fileId = $this->note->getFileId($note->file);
        $this->note->destroy($id);
        //При наличии файла - удаляю его
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
        //Перенаправление на сайт-заглушку при попытке открыть заметку закрытую для публичного доступа
        if(!$note->public)
        {

            return view('notes.permission-denied');
        }

        return view('notes.note-show' , ['note' => $note]);
    }
}

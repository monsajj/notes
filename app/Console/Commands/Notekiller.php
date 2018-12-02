<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Site\Notes\Note;
use App\Site\Files\File;

class Notekiller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notekill:dead';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes all "dead" notes.';

    /**
     * @var Note
     */
    private $note;

    /**
     * @var File
     */
    private $file;

    /**
     * Create a new command instance.
     *
     * @param File $file
     * @param Note $note
     * @return void
     */
    public function __construct(Note $note, File $file)
    {
        parent::__construct();
        $this->file = $file;
        $this->note = $note;
    }

    /**
     * Execute the console command.
     *
     * @throws \Exception
     * @return void
     */
    public function handle():void
    {
        //Получаю список всех заметок у которых "срок жизни" уже закончился
        $notes = $this->note->getDeadNotes();
        //Делаю проход по каждой такой заметке
        foreach ($notes as $note)
        {
            //Если у заметки есть файл то запоминаю его id для последующего удаления
            $fileId = $note->file_id;
            //Удаляю заметку
            $this->note->destroy($note->id);
            //При наличии файла к заметке - удаляю файл
            if($fileId)
            {
                $this->file->deleteFileById($fileId);
            }
        }
    }
}

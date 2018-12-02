<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Site\Notes\Note;
use App\Site\Files\File;
use App\Http\Controllers\NoteController;

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
     * @var NoteController
     */
    private $noteController;

    /**
     * Create a new command instance.
     *
     * @param File $file
     * @param Note $note
     * @param NoteController $noteController
     * @return void
     */
    public function __construct(Note $note, NoteController $noteController, File $file)
    {
        parent::__construct();
        $this->file = $file;
        $this->note = $note;
        $this->noteController = $noteController;
    }

    /**
     * Execute the console command.
     *
     * @throws \Exception
     * @return void
     */
    public function handle():void
    {
        $notes = $this->note->getDeadNotes();
        foreach ($notes as $note)
        {
            $fileId = $note->file_id;
            $this->note->destroy($note->id);
            if($fileId)
            {
                $this->file->deleteFileById($fileId);
            }
        }
    }
}
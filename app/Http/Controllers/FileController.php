<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Site\Files\File;

class FileController extends Controller
{
    /**
     * @var File
     */
    private $file;

    /**
     * FileController constructor.
     * @param File $file
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }


    public function downloadFile($id)
    {
        $filex =$this->file->find($id);

        return Storage::download($filex->src, $filex->name);
    }
}

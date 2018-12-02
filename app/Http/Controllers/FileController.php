<?php

namespace App\Http\Controllers;

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
        //Нахожу файл по id для ссылки на его скачивание
        $file =$this->file->find($id);

        //Возвращаю ссылку на скачивание файла из сайта
        return Storage::download($file->src, $file->name);
    }
}

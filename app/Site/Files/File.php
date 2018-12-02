<?php

namespace App\Site\Files;

use App\Site\Notes\Note;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    protected $fillable = [
        'src',
        'name',
        'type'
    ];

    /**
    * @return HasOne
    */
    public function products()
    {
        return $this->hasOne(Note::class);
    }

    public function saveFile($file)
    {
        $path = $file->store('public');
        $nameExplode = explode(".", $file->getClientOriginalName());
        $originalName = ucfirst(str_slug($nameExplode[0]) . '.' . $nameExplode[1]);
        $mimeType = $file->getClientMimeType();
        $slashPosition = strpos($mimeType, '/');
        $fileType = substr($mimeType, 0, $slashPosition);
        $this->fill([
            'src' => $path,
            'name' => $originalName,
            'type' => $fileType,
        ])->save();
    }

    public function getFileById($id)
    {
        return $this->find($id);
    }

    public function deleteFileById($fileId)
    {
        if($fileId)
        {
            $file = $this->getFileById($fileId);
            Storage::delete($file->src);
            $file->destroy($fileId);
        }

    }
}

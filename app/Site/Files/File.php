<?php
/**
 * Created by PhpStorm.
 * User: monsajj
 * Date: 28.11.18
 * Time: 19:11
 */

namespace App\Site\Files;


use App\Site\Notes\Note;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{

    /**
     * @return HasOne
     */
    public function products()
    {
        return $this->hasOne(Note::class);
    }
}

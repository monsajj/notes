<?php

namespace App\Site\Notes;

use App\Site\Files\File;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'file_id',
        'slug',
        'title',
        'text',
        'public',
        'tags',
        'colour'
    ];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function file()
    {
        return $this->belongsTo(File::class);
    }

    /**
     * @param string $slug
     */
    public function setSlugAttribute(string $slug)
    {
        $this->attributes['slug'] = strtolower($slug);
    }

    /**
     * @param string $text
     */
    public function setTextAttribute(string $text)
    {
        $this->attributes['text'] = trim($text);
    }
}

<?php

namespace App\Site\Notes;

use App\Site\Files\File;
use App\Site\Users\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Auth;

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
        'colour',
        'lifetime'
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
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeByUser(Builder $query, $id)
    {
        return $query->where('id', $id);
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

    public function getUserId()
    {
        return Auth::id();
    }
}

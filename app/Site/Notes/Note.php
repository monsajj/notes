<?php

namespace App\Site\Notes;

use App\Site\Files\File;
use App\Site\Users\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        'lifetime',
        'deathdate'
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

    public function getNotesByUserId()
    {
        $notes = $this->latest('updated_at')->user()->alive()->get();

        return $notes;
    }

    public function getDeadNotes()
    {
        return $this->latest('updated_at')->dead()->get();
    }

    /**
     * @param Builder $builder
     *
     */
    public function scopeUser(Builder $builder)
    {
        $builder->where('user_id', Auth::id());
    }

    /**
     * @param Builder $builder
     *
     */
    public function scopeAlive(Builder $builder)
    {
        $builder->where('deathdate', '>', Carbon::now()->format('Y-m-d H:i:s'));
    }

    /**
     * @param Builder $builder
     *
     */
    public function scopeDead(Builder $builder)
    {
        $builder->where('deathdate', '<', Carbon::now()->format('Y-m-d H:i:s'));
    }

    /**
     * @param string $text
     */
    public function setTextAttribute(string $text)
    {
        $this->attributes['text'] = trim($text);
    }
}

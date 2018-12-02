<?php
/**
 * Created by PhpStorm.
 * User: monsajj
 * Date: 01.12.18
 * Time: 12:46
 */

namespace App\Services\Searcher;


use App\Site\Notes\Note;
use Illuminate\Database\Eloquent\Collection;

class NoteSearcher
{
    /**
     * @var Note
     */
    private $note;

    /**
     * NoteSearcher constructor.
     * @param Note $note
     */
    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    /**
     * @param string $param
     * @param $searchField
     * @return Collection
     */
    public function search($searchField, string $param): Collection
    {
        return $this->note->where([
            [$searchField, 'LIKE', '%' . $param . '%']
        ])->user()->get();
    }
}

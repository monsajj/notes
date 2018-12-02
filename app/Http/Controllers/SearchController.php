<?php

namespace App\Http\Controllers;

use App\Services\Searcher\NoteSearcher;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * @var NoteSearcher
     */
    private $noteSearcher;

    /**
     * SearchController constructor.
     * @param NoteSearcher $noteSearcher
     */
    public function __construct(NoteSearcher $noteSearcher)
    {
        $this->noteSearcher = $noteSearcher;
    }

    public function search(Request $request)
    {
        $foundNotes = $this->noteSearcher->search($request->searchField, $request->param);

        return view('notes.index', ['notes' => $foundNotes]);
    }
}

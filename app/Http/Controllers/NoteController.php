<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site\Notes\Note;

class NoteController extends Controller
{
    /**
     * @var Note
     */
    private $note;

    /**
     * NoteController constructor.
     * @param Note $note
     */
    public function __construct(Note $note)
    {
        $this->note = $note;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = $this->note->all();
        return view('notes.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.note-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->request->getInput();
        $data['categoryid'] = (int)$data['categoryid'];
        if ($this->productValidator->validate($data)) {
            $this->productStore->store($data);
        }
        return $this->redirect('\admin\products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepository->findOneByOrFail('slug', $slug);
        $images = $this->productImageRepository->getImagesForProduct($product->getId());
        return view('front.products.product', compact('product', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = $this->product->findById($id);
        View::renderTemplate('admin/products/update.html', [
            'product' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->delete($id);
        return $this->redirect('\admin\products');
    }
}

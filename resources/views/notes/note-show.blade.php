@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show</div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">id</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="id" value="{{ $note->id }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">user_id</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control" name="user_id" value="{{ $note->user_id }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file_id" class="col-md-4 col-form-label text-md-right">file_id</label>

                            <div class="col-md-6">
                                <input id="file_id" type="text" class="form-control" name="file_id" value="{{ $note->file_id }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="slug" class="col-md-4 col-form-label text-md-right">slug</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control" name="slug" value="{{ $note->slug }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $note->title }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">text</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="text" value="{{ $note->text }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="public" class="col-md-4 col-form-label text-md-right">public</label>

                            <div class="col-md-6">
                                <input id="public" type="text" class="form-control" name="public" value="{{ $note->public }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">tags</label>

                            <div class="col-md-6">
                                <input id="tags" type="text" class="form-control" name="tags" value="{{ $note->tags }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="colour" class="col-md-4 col-form-label text-md-right">colour</label>

                            <div class="col-md-6">
                                <input id="colour" type="text" class="form-control" name="colour" value="{{ $note->colour }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lifetime" class="col-md-4 col-form-label text-md-right">lifetime</label>

                            <div class="col-md-6">
                                <input id="lifetime" type="text" class="form-control" name="lifetime" value="{{ $note->lifetime }}" required autofocus>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a type="" class="btn btn-primary" href="{{ route('notes.index') }}">
                                    Back
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

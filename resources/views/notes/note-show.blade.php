@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show</div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $note->title }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">text</label>

                            <div class="col-md-6">
                                <textarea id="text" type="text" class="form-control" name="text" rows="5" disabled>
                                    {{ $note->text }}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">tags</label>

                            <div class="col-md-6">
                                <input id="tags" type="text" class="form-control" name="tags" value="{{ $note->file }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="colour" class="col-md-4 col-form-label text-md-right">colour</label>

                            <div class="col-md-6">
                                <input id="colour" type="text" class="form-control" name="colour" value="{{ $note->colour }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lifetime" class="col-md-4 col-form-label text-md-right">lifetime</label>

                            <div class="col-md-6">
                                <input id="lifetime" type="text" class="form-control" name="lifetime" value="to delete {{ $note->lifetime }} day(s)" disabled>
                            </div>
                        </div>

                        @if($note->file !== null)
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">file download</label>
                                <div class="col-md-6">
                                    <p>
                                        <a name="image" id="image" type="file" class="form-control"  href="{{ route('file.download', ['path' => $note->file->id]) }}">
                                            Скачать картинку
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a type="" class="btn btn-primary" href="{{ route('notes.index') }}">
                                    <--My Notes
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

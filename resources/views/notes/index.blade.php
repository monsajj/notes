@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Заметки
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a type="submit" class="btn btn-primary" href="{{ route('notes.create') }}">
                                    Create
                                </a>
                            </div>
                        </div>
                    </div>

                    @if($notes->count())
                        @foreach($notes as $note)
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label text-md-right">Title</label>

                                    <div class="col-md-9">
                                        <textarea id="title" class="form-control" name="title">
                                            {{ $note->title }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="text" class="col-sm-2 col-form-label text-md-right">Text</label>

                                    <div class="col-md-9">
                                        <textarea id="text" class="form-control" name="text" rows="5">
                                            {{ $note->text }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a class="btn btn-info" href="{{ route('notes.show', ['id' => $note->id]) }}">
                                            Show
                                        </a>
                                        <a class="btn btn-warning" href="{{ route('notes.edit', ['id' => $note->id]) }}">
                                            Edit
                                        </a>
                                        <a class="btn btn-danger" href="{{ route('notes.delete', ['id' => $note->id]) }}">
                                            Destroy
                                        </a>
                                    </div>
                                </div>

                            </div>
                            @if(!$loop->last)
                                <hr>
                            @endif
                        @endforeach
                    @else

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

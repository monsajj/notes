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
                                    Create Note
                                </a>
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('search') }}">
                                        @csrf

                                        <input id="user_id" type="hidden" name="user_id" value="{{Auth::id()}}"/>

                                        <div class="form-group row">
                                            <label for="param" class="col-md-4 col-form-label text-md-right">Search text</label>

                                            <div class="col-md-6">
                                                <input id="param" type="text" class="form-control{{ $errors->has('param') ? ' is-invalid' : '' }}" name="param" value="{{ old('param') }}" required autofocus>

                                                @if ($errors->has('param'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('param') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="searchField" class="col-md-4 col-form-label text-md-right">Search field</label>

                                            <div class="col-md-6">
                                                <select class="form-control{{ $errors->has('searchField') ? ' is-invalid' : '' }}" id="searchField" name="searchField" required autofocus>
                                                    <option value="title">title</option>
                                                    <option value="text">text</option>
                                                </select>

                                                @if ($errors->has('searchField'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('searchField') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Search
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    @if (Route::current()->getName() != "")
                                        <a class="btn btn-info" href="{{ url('/') }}">
                                            My Notes
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($notes->count())
                        @foreach($notes as $note)
                            <div class="card-body" style="background-color: {{ $note->colour }}">

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
                                        @if($note->public)
                                            <a class="btn btn-info" href="{{ route('make.private', ['id' => $note->id]) }}">
                                                Make Private
                                            </a>
                                            <a class="btn btn-warning" href="{{ route('show.public', ['id' => $note->id]) }}">
                                                Link to public show
                                            </a>
                                        @else
                                            <a class="btn btn-info" href="{{ route('make.public', ['id' => $note->id]) }}">
                                                Make Public
                                            </a>
                                        @endif


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

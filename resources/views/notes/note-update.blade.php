@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('notes.update', ['id' => $note->id]) }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right">user_id</label>

                                <div class="col-md-6">
                                    <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{ $note->user_id }}" required autofocus>

                                    @if ($errors->has('user_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file_id" class="col-md-4 col-form-label text-md-right">file_id</label>

                                <div class="col-md-6">
                                    <input id="file_id" type="text" class="form-control{{ $errors->has('file_id') ? ' is-invalid' : '' }}" name="file_id" value="{{ $note->file_id }}" required autofocus>

                                    @if ($errors->has('file_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right">slug</label>

                                <div class="col-md-6">
                                    <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ $note->slug }}" required autofocus>

                                    @if ($errors->has('slug'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $note->title }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">text</label>

                                <div class="col-md-6">
                                    <input id="text" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" value="{{ $note->text }}" required autofocus>

                                    @if ($errors->has('text'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="public" class="col-md-4 col-form-label text-md-right">public</label>

                                <div class="col-md-6">
                                    <input id="public" type="text" class="form-control{{ $errors->has('public') ? ' is-invalid' : '' }}" name="public" value="{{ $note->public }}" required autofocus>

                                    @if ($errors->has('public'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('public') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tags" class="col-md-4 col-form-label text-md-right">tags</label>

                                <div class="col-md-6">
                                    <input id="tags" type="text" class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" name="tags" value="{{ $note->tags }}" required autofocus>

                                    @if ($errors->has('tags'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colour" class="col-md-4 col-form-label text-md-right">colour</label>

                                <div class="col-md-6">
                                    <input id="colour" type="text" class="form-control{{ $errors->has('colour') ? ' is-invalid' : '' }}" name="colour" value="{{ $note->colour }}" required autofocus>

                                    @if ($errors->has('colour'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('colour') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lifetime" class="col-md-4 col-form-label text-md-right">lifetime</label>

                                <div class="col-md-6">
                                    <input id="lifetime" type="text" class="form-control{{ $errors->has('lifetime') ? ' is-invalid' : '' }}" name="lifetime" value="{{ $note->lifetime }}" required autofocus>

                                    @if ($errors->has('lifetime'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lifetime') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

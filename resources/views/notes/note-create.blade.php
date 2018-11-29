@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('notes.store') }}">
                            @csrf

                            <input id="user_id" type="hidden" name="user_id" value="{{Auth::id()}}"/>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

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
                                    <textarea id="text" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" rows="5" required autofocus>
                                    {{ old('text') }}
                                    </textarea>
                                    @if ($errors->has('text'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tags" class="col-md-4 col-form-label text-md-right">tags</label>

                                <div class="col-md-6">
                                    <input id="tags" type="text" class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" name="tags" value="{{ old('tags') }}" placeholder="not required" autofocus>

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
                                    <select class="form-control{{ $errors->has('colour') ? ' is-invalid' : '' }}" id="colour" name="colour" required autofocus>
                                        <option selected value="white">white</option>
                                        <option value="black">black</option>
                                        <option value="green">green</option>
                                        <option value="yellow">yellow</option>
                                        <option value="red">red</option>
                                        <option value="blue">blue</option>
                                    </select>

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
                                    <select class="form-control{{ $errors->has('lifetime') ? ' is-invalid' : '' }}" id="lifetime" name="lifetime" required autofocus>
                                        <option selected value="30">30 days</option>
                                        <option value="15">15 days</option>
                                        <option value="1">1 day</option>
                                    </select>

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
                                        Create
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

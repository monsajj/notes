@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show</div>

                    <div class="card-body">

                        <div class="form-group row">
                            <h1>
                                Public Permission Denied!
                            </h1>
                        </div>


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

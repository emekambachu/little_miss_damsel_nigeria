@extends('layouts.app')

@section('title')
    Dashboard
@stop

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Total Contestants</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Total Votes</div>

                    <div class="card-body">

                    </div>

                </div>
            </div>

        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-12">

                <a href="{{ route('contestants.index') }}">
                    <button class="btn btn-primary btn-round mb-3">All Contestants</button>
                </a>

                <a href="{{ route('contestants.create') }}">
                    <button class="btn btn-primary btn-round mb-3">Add Contestants</button>
                </a>

                @include('includes.alerts')

                <form method="Post" action="{{ route('contestants.update', $contestant->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label>Full Name</label>
                    <input class="form-control" name="name" type="text" value="{{ $contestant->name }}" required>

                    <label>Image</label>
                    <input class="form-control mb-3" name="image" type="file">

                    <label>Votes</label>
                    <input class="form-control mb-3" name="votes" type="text" value="{{ $contestant->votes }}">

                    <img width="100" src="{{ asset('photos/'.$contestant->image) }}"/>

                    <button type="submit" class="form-control btn btn-success btn-round">Update</button>
                </form>

            </div>

        </div>

    </div>
@endsection

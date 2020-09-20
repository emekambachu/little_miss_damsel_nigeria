@extends('layouts.app')

@section('title')
    Search Results
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

        <div class="row mt-4">
            <div class="col-md-4">
                <a href="{{ route('contestants.create') }}">
                    <button class="btn btn-primary btn-round mb-3">Add New Contestant</button>
                </a>
            </div>

            <div class="col-md-8 text-center">
                <form method="get" action="{{ url('admin/search-contestants') }}">
                    @csrf
                    <input class="form-control" name="name" type="text" required>
                    <button type="submit" class="btn btn-primary btn-round mt-2">Search</button>
                </form>
            </div>
        </div>

        @if( $countResults === 0 )
            <div class="alert alert-danger alert-dismissable" style="width: 60%; margin: 10px auto;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <ul class="text-center" style="list-style: none; margin: 0 auto;">
                    No Results Found <strong>{{ !empty($emptyResult) ? $emptyResult : '' }}</strong>!!!
                </ul>
            </div>
        @endif

        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                @include('includes.alerts')

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Names</th>
                        <th scope="col">Images</th>
                        <th scope="col">Votes</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($contestants as $index => $con)
                        <tr>
                            <th scope="row">{{ $index + $contestants->firstItem() }}</th>
                            <td>{{ $con->name }}</td>
                            <td><img src="{{ asset('photos/'.$con->image) }}" width="90"/> </td>
                            <td>{{ $con->votes }}</td>
                            <td>
                                <a href="{{ route('view-contestant', $con->slug) }}">
                                    <button class="btn btn-warning btn-sm">View</button>
                                </a>

                                <a href="{{ route('contestants.edit', $con->id) }}">
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                </a>

                                <!--Delete modal Button-->
                                <button type="button" class="btn btn-danger btn-sm"
                                        data-toggle="modal" data-target="#delete{{ $con->id }}">
                                    Delete
                                </button>

                                <!--Delete modal Popup-->
                                <div class="modal fade text-left" id="delete{{ $con->id }}"
                                     tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                                     aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h6 class="modal-title" id="myModalLabel1">
                                                    Delete <span class="text-bold-700">
                                                        {{ $con->name }}</span>?</h6>
                                                <button type="button" class="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <form method="POST"
                                                      action="{{ action('Admin\AdminContestantController@destroy', $con->id) }}"
                                                      style="margin-bottom: 5px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Yes</button>
                                                    <button type="button" class="btn btn-info btn-sm"
                                                            data-dismiss="modal">No</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($contestants->lastPage() > 1)
                        {{ $contestants->render() }}
                    @endif
                </ul>
            </nav>

        </div>

    </div>
@endsection

@extends('layouts.app')

@section('title')
    All Payments
@stop

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Contestants</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Votes</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Payments</div>

                    <div class="card-body">
                    </div>

                </div>
            </div>

        </div>

        <div class="row mt-4">

            <div class="col-md-9 text-center">
                <form method="get" action="{{ url('admin/search-payments') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <input class="form-control" name="name" type="text" required>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-round float-left">Search Payments</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                @include('includes.alerts')

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Voter</th>
                        <th scope="col">Contestant</th>
                        <th scope="col">Votes</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($payments as $index => $pay)
                        <tr>
                            <th scope="row">{{ $index + $payments->firstItem() }}</th>
                            <td><strong>Name:</strong> {{ $pay->accname }}<br>
                                <strong>Email:</strong> {{ $pay->email }}
                            </td>
                            <td>{{ $pay->contestant ? $pay->contestant->name : Null }} </td>
                            <td><strong>Votes:</strong> {{ $pay->votes }}<br>
                                <strong>Amount:</strong> {{ $pay->amount }}
                            </td>
                            <td>{{ $pay->payment_method }}</td>
                            <td>{{ $pay->status ? 'Paid' : 'Pending' }}</td>
                            <td>
                                <!--Verification modal Button-->
                                @if($pay->status)
                                <button type="button" class="btn btn-danger btn-sm"
                                        data-toggle="modal" data-target="#approve{{ $pay->id }}">
                                    Un-approve
                                </button>
                                @else
                                <button type="button" class="btn btn-success btn-sm"
                                        data-toggle="modal" data-target="#approve{{ $pay->id }}">
                                    Approve
                                </button>
                                @endif

                                <!--Verification modal Popup-->
                                <div class="modal fade text-left"
                                     id="approve{{ $pay->id }}" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel1"
                                     aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h6 class="modal-title" id="myModalLabel1">
                                                    @if($pay->status)Un-approve
                                                    @else Approve @endif
                                                    <span class="text-bold-700">
                                                            {{ $pay->accname }}'s Payment</span>?</h6>
                                                <button type="button" class="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <form method="POST"
                                                      action="{{ action('Admin\AdminContestantController@approve', $pay->id) }}"
                                                      style="margin-bottom: 5px;">
                                                    @csrf
                                                    <button type="submit"
                                                            class="btn btn-success btn-sm">Yes</button>
                                                    <button type="button" class="btn btn-danger btn-sm"
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
                    @if ($payments->lastPage() > 1)
                        {{ $payments->render() }}
                    @endif
                </ul>
            </nav>

        </div>

    </div>
@endsection

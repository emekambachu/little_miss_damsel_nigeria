@extends('layouts.app')

@section('title')
    Pending Applications
@stop

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Total Applications</div>

                    <div class="card-body">
                        {{ $countAllApplications }}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Paid Applications</div>

                    <div class="card-body">
                        {{ $countPaidApplications }}
                    </div>

                </div>
            </div>

        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-12">

                @include('includes.alerts')

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Othername</th>
                        <th scope="col">Age</th>
                        <th scope="col">Par Surname</th>
                        <th scope="col">Par Other Names</th>
                        <th scope="col">Par Mobile</th>
                        <th scope="col">Par Email</th>
                        <th scope="col">Payment Details</th>
                        <th scope="col">Paid</th>
                        <th scope="col">View</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($applications as $index => $application)
                        <tr>
                            <th scope="row">{{ $index + $applications->firstItem() }}</th>
                            <td>{{ $application->surname }}</td>
                            <td>{{ $application->othernames }}</td>
                            <td>{{ $application->age }}</td>
                            <td>{{ $application->parent_surname }}</td>
                            <td>{{ $application->parent_othernames }}</td>
                            <td>{{ $application->parent_mobile }}</td>
                            <td>{{ $application->parent_email }}</td>
                            <td>{{ $application->payment_details }}</td>
                            <td>
                                @if($application->paid)
                                    <p class="text-success"><strong>PAID</strong></p>
                                    <form method="POST" action="{{ action('ApplicationController@approve', $application->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-md">
                                            Disapprove
                                        </button>
                                    </form>
                                @else
                                    <p class="text-danger"><strong>PENDING</strong></p>
                                    <form method="POST" action="{{ action('ApplicationController@approve', $application->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-md">
                                            Approve
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('applications.show', $application->id) }}">
                                    <button class="btn btn-warning btn-md">View</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $applications->appends(Request::all())->links() }}
                </ul>
            </nav>

        </div>

    </div>
@endsection

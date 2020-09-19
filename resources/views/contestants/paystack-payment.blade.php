@extends('layouts.main')

@section('title')
    Contestants
    @endsection

    @section('contents')
    </header>
    <!--header end-->

    <!--site-main start-->
    <div class="site-main">
        <div class="ttm-page-title-row text-center">
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">{{ $con->name }}</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="{{ url('/') }}"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span><a title="Contestants" href="{{ url('contestants') }}">
                                    <i class="fa fa-star"></i>&nbsp;&nbsp;Contestants</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span><a title="Contestants" href="">
                                    <i class="fa fa-star"></i>&nbsp;&nbsp;{{ $con->name }}</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="ttm-row portfolio-section clearfix ttm-bgcolor-dark-grey">
            <div class="container">
                <!-- row -->
                <div class="row">

                    <div class="col-md-6">
                        <div class="ttm-pf-single-content-wrapper-innerbox ttm-pf-view-left-image">
                            <div class="row">
                                <div class="col-lg-12 ttm-single-content-wrap-box res-991-mlr-15">
                                    <div class="ttm-pf-single-detail-box text-left">
                                        <div class="ttm-pf-detailbox">

                                            @include('includes.alerts')

                                            <h4>Payment Details</h4>
                                            <img src="{{ asset('main/paystack_logo.png') }}" width="150" class="mb-3"/>

                                            <p><strong>Name:</strong>
                                                {{ !empty(Session::get('accname')) ? Session::get('accname') : Null }} </p>

                                            <p><strong>Votes:</strong>
                                                {{ !empty(Session::get('votes')) ? Session::get('votes') : Null }} </p>

                                            <p><strong>Amount:</strong>
                                                ₦ {{ !empty(Session::get('amount')) ? Session::get('amount') : Null }} </p>

                                            <form method="POST" action="{{ route('pay') }}"
                                                  accept-charset="UTF-8" class="form-horizontal" role="form">
                                                <div class="row" style="margin-bottom:40px;">
                                                    <div class="col-md-8 col-md-offset-2">
                                                        <input type="hidden" name="first_name"
                                                               value="{{ !empty(Session::get('accname')) ? Session::get('accname') : Null }}">  <!--required-->
                                                        <input type="hidden" name="email"
                                                               value="{{ !empty(Session::get('email')) ? Session::get('email') : Null }}">  <!--required-->
                                                        <input type="hidden" name="amount"
                                                               value="5000">  <!--required in kobo-->
                                                        <input type="hidden" name="quantity"
                                                               value="{{ !empty(Session::get('votes')) ? Session::get('votes') : Null }}">
                                                        <input type="hidden" name="currency" value="NGN">
                                                        <input type="hidden" name="metadata"
                                                               value="{{ json_encode($array = [
                                            'name' => !empty(Session::get('accname')) ? Session::get('accname') : Null,
                                            'email' => !empty(Session::get('email')) ? Session::get('email') : Null,
                                            'contestant_id' => !empty(Session::get('contestant_id')) ? Session::get('contestant_id') : Null,
                                            'votes' => !empty(Session::get('votes')) ? Session::get('votes') : Null,
                                            'amount' => !empty(Session::get('amount')) ? Session::get('amount') : Null,
                                            ]) }}">  <!--For other necessary things you want to add to your payload. it is optional though-->
                                                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">  <!--required-->
                                                        @csrf

                                                        <p>
                                                            <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                                                <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                                            </button>
                                                        </p>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


    </div><!-- site-main end -->

@endsection

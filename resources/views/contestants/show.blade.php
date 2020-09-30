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
                            <span><a title="Contestants" href="{{ route('vote-contestants.index') }}">
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
            <div class="container-fluid">
                <!-- row -->
                <div class="row">

                    <div class="col-md-12">

                        @include('includes.alerts')

                        <div class="ttm-pf-single-content-wrapper-innerbox ttm-pf-view-left-image">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="ttm_single_image_wrapper">
                                        <img class="img-fluid" src="{{ asset('photos/'.$con->image) }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 ttm-single-content-wrap-box res-991-mlr-15">
                                    <div class="ttm-pf-single-detail-box text-left">
                                        <div class="ttm-pf-detailbox">

                                            <div style="font-size: 40px;">
                                                <h4 style="margin-bottom: 5px;" class="title">Voting Closes in:</h4>
                                                <p class="text-purple" id="demo"></p>
                                            </div>

                                            <h4 class="text-purple">Payment Methods: (50 Naira per Vote)</h4>
                                            <p><strong>1) Fill in your details to Pay with Paystack</strong></p>
                                            <img src="{{ asset('main/paystack_logo.png') }}" width="150"/>

                                            <form class="row contactform wrap-form clearfix" method="post"
                                                  action="{{ url('contestant/paystack/'.$con->id) }}">
                                                @csrf
                                                <label class="col-md-4">
                                                    <i class="ti ti-user"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input" name="accname" type="text"
                                                               value="" placeholder="Full Name:*"
                                                               required="required"></span>
                                                </label>
                                                <label class="col-md-4">
                                                    <i class="ti ti-email"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input" name="email" type="text"
                                                               value="" placeholder="Your email-id:*"
                                                               required="required"></span>
                                                </label>
                                                <label class="col-md-4">
                                                    <i class="ti ti-star"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input" minlength="4" name="votes" type="number"
                                                               placeholder="Votes (Minimum 4):*"
                                                               required="required"></span>
                                                </label>
                                                <input name="submit" type="submit" value="Submit" class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mb-15" id="submit" title="Submit">
                                            </form>

                                            <p>
                                                <strong>
                                                    2) Or Pay to our bank account first, then fill in your details below.
                                                    The votes would be added upon payment approval
                                                </strong><br><br>

                                                <strong>Pay to the account details below</strong><br>
                                                <strong>Account Name:</strong> Little Miss Damsel Nigeria<br>
                                                <strong>Account number:</strong> 0432091606<br>
                                                <strong>Bank:</strong> GT Bank<br><br>

                                                <strong>Voting reflects after 4 hours</strong>
                                            </p>

                                            <form class="row contactform wrap-form clearfix" method="post"
                                                  action="{{ url('contestant/bank-payment/'.$con->id) }}">
                                                @csrf
                                                <label class="col-md-4">
                                                    <i class="ti ti-user"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input" name="accname" type="text"
                                                               value="" placeholder="Full Name (from bank):*"
                                                               required="required"></span>
                                                </label>

                                                <label class="col-md-4">
                                                    <i class="ti ti-user"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input" name="accnum" type="text"
                                                               value="" placeholder="Account Number:*"
                                                               required="required"></span>
                                                </label>

                                                <label class="col-md-4">
                                                    <i class="ti ti-user"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input" name="bankname" type="text"
                                                               value="" placeholder="Bank Name:*"
                                                               required="required"></span>
                                                </label>

                                                <label class="col-md-4">
                                                    <i class="ti ti-email"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input" name="email" type="text"
                                                               value="" placeholder="Your email-id:*"
                                                               required="required"></span>
                                                </label>

                                                <label class="col-md-4">
                                                    <i class="ti ti-star"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input" minlength="4" name="votes" type="number"
                                                               placeholder="Vote as much as you can*"
                                                               required="required"></span>
                                                </label>

                                                <div class="col-md-4">
                                                    <input name="submit" type="submit" value="Submit" class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-10" id="submit" title="Submit">
                                                </div>
                                            </form>

                                        </div>
                                        <div class="social-icons square social-hover mt-30">
                                            <div class="ttm-social-share-title">Share</div>
                                            <ul class="list-inline m-0 social-inline">
                                                <li class="social-facebook"><a href="#" class="shape-round"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li class="social-twitter"><a href="#" class="shape-round"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li class="social-linkedin"><a href="#" class="shape-round"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                            </ul>
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

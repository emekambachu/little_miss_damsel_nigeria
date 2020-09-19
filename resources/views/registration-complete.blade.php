@extends('layouts.main')

@section('title')
    Registration
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
                        <h1 class="title">Registration</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="{{ url('/') }}"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">Registration</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="ttm-row contact-form-section2 bg-layer break-991-colum clearfix">
            <div class="container-fluid">
                <div class="row res-1199-mlr-15">

                    <div class="col-lg-4 col-md-4 pr-3">
                        <div class=" section-title clearfix">
                            <h3 style="color: #AF0558;">Payment Procedures</h3>
                            <div class="heading-seperator"><span></span></div>
                            <p><strong>Account Details</strong><br>
                                Little Miss Damsel Nigeria<br>
                                Account number<br>
                                0432091606<br>
                                GTB<br><br>


                                <strong>Step 1:</strong><br>
                                Pay a sum of 5000 Naira to our Nigerian Account. Above are our account details<br><br>

                                <strong>Step 2:</strong><br>
                                Fill in your details accurately and upload a scanned copy of your proof of payment, this will make our selection more efficient.<br><br>

                                <strong>Step 3:</strong><br>
                                Once payment has been approved, you would be sent a confirmation email.<br>

                                For more clarity please call our contacts at the bottom of the page or send us an email at info@kidstarmodels.com</p>
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-8">
                        <div class="padding-12 box-shadow">
                            <!-- section title -->
                            <div class="section-title clearfix mb-30">
                                <h3 style="color: #AF0558;">
                                    Congratulations on starting your journey as a Little Miss Damsel Nigeria Model</h3>
                                <p>Your registration has been completed, once your payment is confirmed, you would get a confirmation email and proceed with your application.<br>
                                    Check our social media below for more details on our events</p>
                            </div><!-- section title end -->
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div><!-- site-main end -->
@endsection

@section('bottom-scripts')

    <script type= "text/javascript" src = "{{ asset('main/js/countries.js') }}"></script>

    <script language="javascript">
        populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
        populateCountries("country2");
        populateCountries("country2");
    </script>
@endsection

@extends('layouts.main')

@section('title')
    Contact us
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
                        <h1 class="title">Contact us</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="{{ url('/') }}"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">Contact us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--event-section3 start-->
        <section class="ttm-row contact-details-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row text-left">
                    <div class="col-lg-9 col-md-9">

                        @include('includes.alerts')

                        <div class=" section-title clearfix">
                            <h4>GET IN TOUCH</h4>
                            <div class="heading-seperator"><span></span></div>
                            <p>If you have any questions simply use the following contact details.</p>
                        </div>
                    </div>
                </div><!--row-end-->
                <div class="row mt-25">
                    <div class="col-md-4">
                        <div class="featured-box style2 left-icon icon-align-top">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-skincolor ttm-icon_element-style-round">
                                    <i class="ti ti-headphone-alt"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>Phone</h5>
                                </div>
                                <div class="featured-desc">
                                    <p>08091304065, <br>08181073065, <br>09014818914</p>
                                </div>
                            </div>
                        </div><!-- featured-box end-->
                    </div>
                    <div class="col-md-4">
                        <div class="featured-box style2 left-icon icon-align-top">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-skincolor ttm-icon_element-style-round">
                                    <i class="ti ti-location-pin"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>Address</h5>
                                </div>
                                <div class="featured-desc">
                                    <p>Plot f6 Abacha road GRA, Port Harcourt, Rivers state, Nigeria</p>
                                </div>
                            </div>
                        </div><!-- featured-box end-->
                    </div>
                    <div class="col-md-4">
                        <div class="featured-box style2 left-icon icon-align-top">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-skincolor ttm-icon_element-style-round">
                                    <i class="ti ti-email"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>E-Mail</h5>
                                </div>
                                <div class="featured-desc">
                                    <p>info@littlemissdamsel.com</p>
                                </div>
                            </div>
                        </div><!-- featured-box end-->
                    </div>
                </div>
            </div>
        </section>

        <section class="ttm-row contact-form-section2 bg-layer break-991-colum clearfix">
            <div class="container">
                <div class="row res-1199-mlr-15">
                    <div class="col-md-12 col-lg-12">
                        <div class="padding-12 box-shadow">
                            <!-- section title -->
                            <div class="section-title clearfix mb-30">
                                <h3 class="title">Send us a Message</h3>
                            </div><!-- section title end -->

                            <form class="row contactform wrap-form clearfix" method="post"
                                  action="{{ url('submit-contact') }}" novalidate="novalidate">
                                @csrf
                                <label class="col-md-4">
                                    <i class="ti ti-user"></i>
                                    <span class="ttm-form-control"><input class="text-input" name="name" type="text" value="" placeholder="Your Name:*" required="required"></span>
                                </label>
                                <label class="col-md-4">
                                    <i class="ti ti-email"></i>
                                    <span class="ttm-form-control"><input class="text-input" name="email" type="text" value="" placeholder="Your email-id:*" required="required"></span>
                                </label>
                                <label class="col-md-4">
                                    <i class="ti ti-mobile"></i>
                                    <span class="ttm-form-control"><input class="text-input" name="mobile" type="text" value="" placeholder="Mobile Number:" required="required"></span>
                                </label>
                                <label class="col-md-12">
                                    <i class="ti ti-comment"></i>
                                    <span class="ttm-form-control"><textarea class="text-area" name="yourmessage" placeholder="Your Message:*" required="required"></textarea></span>
                                </label>
                                <input name="submit" type="submit" value="Submit" class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20" id="submit" title="Submit">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 d-flex m-b30">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.739384999036!2d6.987200614201693!3d4.81475029650362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1069ce8a3d7d0075%3A0xe661672f692182cf!2sSani%20Abacha%20Road%2C%20Rumueme%2C%20Port%20Harcourt!5e0!3m2!1sen!2sng!4v1573651868471!5m2!1sen!2sng" style="border:0;" allowfullscreen="" width="100%" height="450" frameborder="0"></iframe>
                    </div>
                </div>

            </div>
        </section>

    </div><!-- site-main end -->

@endsection

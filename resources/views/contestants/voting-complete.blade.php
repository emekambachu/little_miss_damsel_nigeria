@extends('layouts.main')

@section('title')
    Voting Complete
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
                        <h1 class="title">Voting Complete</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="{{ url('/') }}"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span><a title="Contestants" href="{{ url('contestants') }}">
                                    <i class="fa fa-star"></i>&nbsp;&nbsp;Contestants</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span><a title="Contestants" href="">
                                    <i class="fa fa-star"></i>&nbsp;&nbsp;Voting Complete</a></span>
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
                        <h3>Voting Complete</h3>
                    </div>

                </div>
            </div>
        </section>


    </div><!-- site-main end -->

@endsection

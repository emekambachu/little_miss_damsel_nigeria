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
                            <span>
                                <a title="Homepage" href="{{ url('/') }}">
                                    <i class="fa fa-home"></i>&nbsp;&nbsp;Contestants (Keep Voting)</a>
                            </span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span>
                                <a title="Contestants" href="">
                                    <i class="fa fa-star"></i>&nbsp;&nbsp;Voting Complete</a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div><!-- site-main end -->

@endsection

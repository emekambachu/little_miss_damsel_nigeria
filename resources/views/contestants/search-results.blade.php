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
                        <h1 class="title">Contestants</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="{{ url('/') }}"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">Contestants</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="ttm-row upcoming-event-section">
            <div class="container">

                <div class="row">
                    <form class="contactform wrap-form clearfix text-center" method="get"
                          action="{{ url('contestants/search') }}" novalidate="novalidate">
                        @csrf
                        <label class="col-md-8">
                            <i class="ti ti-user"></i>
                            <span class="ttm-form-control">
                                <input class="text-input" name="name" type="text" value=""
                                       placeholder="Search Contestants" required="required"></span>
                        </label>

                        <input name="submit" type="submit" value="Search"
                               class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20 mb-20"
                               id="submit" title="Search">
                    </form>
                </div>

                <div class="row">
                    @foreach($contestants as $index => $con)
                        <div class="col-md-6 col-lg-4 mb-30">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox ttm-box-view-top-image featured-imagebox-post-details">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="{{ asset('photos/'.$con->image) }}" alt="img">
                                </div>
                                <div class="featured-bottom-content text-left position-relative">
                                    {{--                                <div class="ttm-box-post-date shape-rounded ttm-bgcolor-skincolor">--}}
                                    {{--                                        <span class="ttm-entry-date">--}}
                                    {{--                                            <time class="entry-date" datetime="2019-01-16T07:07:55+00:00">24<span class="entry-month entry-year">sep</span></time>--}}
                                    {{--                                        </span>--}}
                                    {{--                                </div>--}}
                                    <div class="featured-title">
                                        <h5>
                                            <a style="color: #AF0558;" href="{{ route('view-contestant', $con->slug) }}">{{ $con->name }}</a></h5>
                                    </div>
                                    {{--                                <div class="featured-desc">--}}
                                    {{--                                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below.</p>--}}
                                    {{--                                </div>--}}
                                    {{--                                <div class="post-meta">--}}
                                    {{--                                        <span class="ttm-meta-line">--}}
                                    {{--                                            <i class="fa fa-map-marker"></i>--}}
                                    {{--                                            Manhamman, New Yok--}}
                                    {{--                                        </span>--}}
                                    {{--                                </div>--}}
                                    <div class="post-desc-footer">
                                        <a style="color: #AF0558;" class="ttm-btn btn-inline ttm-icon-btn-right ttm-btncolor-black"
                                           href="{{ route('view-contestant', $con->slug) }}">
                                            Vote<i class="ti ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox -->
                        </div>
                    @endforeach
                </div>


                @if ($contestants->lastPage() > 1)
                    {{ $contestants->render() }}
                @endif

            </div>
        </section>
    </div><!-- site-main end -->

@endsection

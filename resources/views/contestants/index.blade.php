@extends('layouts.main')

@section('title')
Contestants
@endsection

@section('top-assets')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('contents')
    </header>
    <!--header end-->

    <!--site-main start-->
    <div id="app" class="site-main">
        <home-contestants></home-contestants>
    </div><!-- site-main end -->

@endsection

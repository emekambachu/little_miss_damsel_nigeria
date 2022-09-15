@extends('layouts.main')

@section('title')
{{ $contestant->name }}
@endsection

@section('top-assets')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('contents')
</header>
<!--header end-->

<!--site-main start-->
<div id="app" class="site-main">
    @if(Session::has('error'))
        <p class="text-danger">{{ Session::get('error') }}</p>
    @endif
    <home-contestant-show
        :contestant="{{ $contestant }}"
        :reference="{{ Paystack::genTranxRef() }}"
    ></home-contestant-show>
</div><!-- site-main end -->
@endsection

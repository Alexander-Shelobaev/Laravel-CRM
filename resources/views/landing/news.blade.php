@php
    $headerClass = 'navbar-default navbar-fixed-top ';
@endphp

@extends('layouts.landing')

@section('title', '$news->headline')

@section('content')
<div id="" class="">
  <div class="container" style="padding-top: 100px;padding-bottom: 100px;">
    <h2>{{ $news->headline }}</h2>
    <div style="height: 500px;  background: url({{asset('/assets-landing/img')}}/{{ $news->detailed_picture }}) 100% 50% no-repeat; background-size: cover; margin-bottom: 50px;"></div>
    {!! $news->detailed_desc !!}
    <div class="newslist-date"><small><i class="fa fa-calendar-o"></i> {{ $news->created_at->format('d F Y') }}</small></div>
    <a href="{{ route('landingHome') }}#news" class="btn btn-theme btn-sm"> На главную</a>
  </div>
</div>
@endsection

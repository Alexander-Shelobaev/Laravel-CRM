@php
    $headerClass = 'navbar-default navbar-fixed-top ';
@endphp

@extends('layouts.landing')

@section('title', '')

@section('content') 
<div id="" class="">
    <div class="container" style="padding-top: 100px; padding-bottom: 100px;">
        {!! $service->description !!}
    </div>
</div> 
@endsection     
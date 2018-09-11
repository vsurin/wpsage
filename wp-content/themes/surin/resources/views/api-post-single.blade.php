{{--
  Template Name: API post single
--}}

@extends('layouts.app')

@section('content')
    @php
        $post = \App\Controllers\App::postSingleResponse()
    @endphp

    <div class="api-body-post">
        <h1>{{ $post->title }}</h1>
        <div>{!! $post->content !!}</div>
    </div>
@endsection
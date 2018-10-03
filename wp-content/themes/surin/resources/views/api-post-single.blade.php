{{--
  Template Name: API post single
--}}

@extends('layouts.app-single')

@section('content')
    @php
        $post = \App\Controllers\App::postSingleResponse()
    @endphp

    @if ($post !== null)
        <div class="api-body-post">
            <h1>{{ $post->title }}</h1>weqweqwe
            <div>{!! $post->content !!}</div>
        </div>
    @else
        @include('partials.404')
    @endif

    <div class="api-bottom-post"></div>
@endsection
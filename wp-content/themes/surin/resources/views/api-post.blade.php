{{--
  Template Name: API post
--}}

@extends('layouts.app')

@section('content')
    @php
        $posts = \App\Controllers\App::postResponse()
    @endphp

    @foreach($posts as $key => $post)
        <div class="api-post-conten">
            @php
                $classContentPost = 'api-post-conten-full'
            @endphp

            @if($post->image)
                <div class="api-post-conten-image">
                    <div style="background: url('http://127.0.0.1:8000/upload/{{ $post->image }}')"></div>
                </div>

                @php
                    $classContentPost = 'api-post-conten-text'
                @endphp
            @endif

            <div class="{{ $classContentPost }}">
                <h3>{{ $post->title }}</h3>
                <div>{{ $post->content }}</div>
                <a href="/api-post-single/{{ $post->id }}/" class="api-buttom-link"><div class="bottom-readmore">Read more</div></a>
            </div>
        </div>
        <div class="api-bottom-post"></div>
        @if (count($posts) > $key + 1)
            <hr class="api-post-hr" size="1">
        @endif
    @endforeach

    <div class="pagination">{!! \App\Controllers\App::getPagination() !!}</div>

    <div class="api-bottom-post"></div>
@endsection
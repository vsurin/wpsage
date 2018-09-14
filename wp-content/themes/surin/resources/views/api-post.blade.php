{{--
  Template Name: API post
--}}

@extends('layouts.app')

@section('content')
    @php
        $posts = \App\Controllers\App::postResponse()
    @endphp

    @if ($posts !== null)
        @foreach($posts as $key => $post)
            <div class="api-post-conten">
                @php
                    $classContentPost = 'api-post-conten-full'
                @endphp

                @if($post->image)
                    <div class="api-post-conten-image">
                        <div style="background: url('http://test2.loc/upload/{{ $post->image }}')"></div>
                    </div>

                    @php
                        $classContentPost = 'api-post-conten-text'
                    @endphp
                @endif

                <div class="{{ $classContentPost }}">
                    <h3>{{ $post->title }}</h3>
                    <span class="api-category-post">Posted in <span>{{ $post->c_title }}</span></span>
                    <div class="api-post-content-div">{!! \Illuminate\Support\Str::limit($post->content, 470 ,'....')  !!}</div>
                    <a href="/api-post-single/{{ $post->id }}/" class="api-buttom-link"><div class="bottom-readmore">Read more</div></a>
                </div>
            </div>
            <div class="api-bottom-post"></div>
            @if (count($posts) > $key + 1)
                <hr class="api-post-hr" size="1">
            @endif
        @endforeach
    @else
        @include('partials.404')
    @endif

    @if ($posts !== null)
    <div class="pagination">{!! \App\Controllers\App::getPagination() !!}</div>
    @endif

    <div class="api-bottom-post"></div>
@endsection
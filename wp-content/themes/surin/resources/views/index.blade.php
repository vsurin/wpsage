{{--
  Template Name: API post
--}}

@php
  global $wp_query;
@endphp

@extends('layouts.app')

@section('content')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @while (have_posts()) @php the_post() @endphp
    <div class="api-post-conten">
      @php
        $classContentPost = 'api-post-conten-full';
        $categories = \App\Controllers\App::getCategories(get_the_ID());
      @endphp

      @if(get_the_post_thumbnail_url())
        <div class="api-post-conten-image">
          <div style="background: url('{{ get_the_post_thumbnail_url() }}')"></div>
        </div>

        @php
          $classContentPost = 'api-post-conten-text'
        @endphp
      @endif

      <div class="{{ $classContentPost }}">
        <h3>{{ get_the_title() }} </h3>

        @include('partials/entry-meta')

        @if($categories != '')
          <span class="api-category-post">Posted in <span>{{ $categories }}</span></span>
        @endif

        <div class="api-post-content-div">{!! \Illuminate\Support\Str::limit(get_the_content(), 470 ,'....')  !!}</div>
        <a href="{{ get_the_permalink() }}" class="api-buttom-link"><div class="bottom-readmore">Read more</div></a>
      </div>
    </div>
    <div class="api-bottom-post"></div>

    <?php if( ($wp_query->current_post + 1) < ($wp_query->post_count) ) { ?>
      <hr class="api-post-hr" size="1">
    <?php } ?>

  @endwhile

  <div class="pagination">{!! \App\Controllers\App::getPaginationPost(wp_count_posts()->publish) !!}</div>


  <div class="api-bottom-post"></div>
@endsection
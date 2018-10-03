@extends('layouts.app-single')

@section('content')
    <div class="single-content">
        @include('partials.brecambs')
        @while(have_posts()) @php the_post() @endphp
        @include('partials.content-single-'.get_post_type())
        @endwhile
    </div>
    <div class="sitebar">
        @include('partials.sidebar')
    </div>
    <div class="clear-both"></div>
@endsection

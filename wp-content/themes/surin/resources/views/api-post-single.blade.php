{{--
  Template Name: API post single
--}}

@extends('layouts.app')

@section('content')
    {{ \App\Controllers\App::postSingleResponse() }}
@endsection
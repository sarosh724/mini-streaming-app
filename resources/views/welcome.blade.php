@extends('template.index')

@section('page-name')
    Home
@stop

@section('content')
    @include('sections.banners')

    @include('sections.departments')

    @include('sections.testimonials')

    @include('sections.blogs')
@stop

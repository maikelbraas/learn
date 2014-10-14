@extends('layouts.master')

@section('head')
    @parent
    <title>Projects</title>
@stop

    @section('content')

            @foreach($pages as $page)
            <li><a href="{{ URL::route("getPage", array('title' => $page->title)) }}">{{ $page->title }}</a></li>
            @endforeach()
    @stop

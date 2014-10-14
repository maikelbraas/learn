@extends('layouts.master')

    @section('head')
        @parent
        <title>
        {{ $pages->title }}
        </title>

    @stop

    @section('content')
    {{ $pages->body }}
    @stop
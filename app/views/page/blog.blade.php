@extends('layouts.master')

    @section('head')
        @parent
        <title>Blog</title>
    @stop

    @section('content')

        {{ Form::open(array('method' => 'post', 'action' => 'postBlog')) }}
    @if($errors->any)
        {{ $errors->first() }}
    @endif
            <div class="form-group">
                {{ Form::label('title', 'Title', array('class' => 'label label-default')) }}
                {{ Form::text('title', '', array('class' => 'form-control', 'autofocus' => 'autofocus')) }}
            </div>
            <div class="form-group">
                {{ Form::label('message', 'Message', array('class' => 'label label-default')) }}
                {{ Form::textarea('message', '', array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Submit!', array('class' => 'btn btn-default')) }}
            </div>
        {{ Form::close() }}


    @foreach($posts as $post)
    <div class="list-group list-group-item">
        <h4 class="list-group-item-heading">{{ $post->title }}</h4>
        <div class="list-group-item-text">{{ $post->message }}</div>
        <h6 class="blog-post-meta">{{ $post->updated_at }}</h6>
    </div>
    @endforeach
    @stop

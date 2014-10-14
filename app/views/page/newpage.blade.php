@extends('layouts.master')

@section('head')
    @parent
    <title>New page</title>
@stop

    @section('content')
    <h2>Create new page</h2>
        <div class="form-content">

        {{ Form::open(array('method' => 'post', 'action' => 'postNewpage', 'files' => true)) }}
                <div class="form-group">
                {{ Form::label('title', 'Title', array('class' => 'label label-default')) }}
                {{ Form::text('title', '', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                {{ Form::label('content', 'Content', array('class' => 'label label-default')) }}
                {{ Form::textarea('content', '', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('Submit!', array('form-control')) }}
                </div>
        {{ Form::close() }}
        </div>
    @stop

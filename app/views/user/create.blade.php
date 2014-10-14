@extends('layouts.master')

@section('head')
    @parent
        <title>Register</title>
@stop

@section('content')
<div class='container'>
    {{ Form::open(array('method' => 'post', 'action' => 'postCreate')) }}
    @if($errors->any)
        {{ $errors->first() }}
    @endif
    <div class="form-group">
        {{ Form::label('username', 'Username', array('class' => 'label label-primary')) }}
        {{ Form::text('username', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Password', array('class' => 'label label-primary')) }}
        {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('confirm-password', 'Confirm Password', array('class' => 'label label-primary')) }}
        {{ Form::password('confirm-password', array('class' => 'form-control')) }}
    </div>
        {{ Form::token() }}

        {{ Form::submit('Submit!', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
</div>
@stop
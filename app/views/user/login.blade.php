@extends('layouts.master')

@section('head')
    @parent
        <title>Login</title>
@stop

@section('content')
<div class='container'>
    {{ Form::open(array('method' => 'post', 'action' => 'postLogin')) }}
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
        {{ Form::checkbox('remember') }}
        {{ Form::label('remember', 'Remember me') }}
        {{ Form::token() }}
    </div>
        {{ Form::submit('Submit!', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
</div>
@stop
@extends('layout')
@section('content')
<div class="container">
    <div>
        @if (Session::get('error'))
        <div class="alert alert-error">{{{ Session::get('error') }}}</div>
        @endif

        @if (Session::get('notice'))
        <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif

        {!! Form::open(['reminders.update', $id, $code]) !!}
            {!! Form::password('password', array('placeholder'=>'new password', 'required'=>'required')) !!}
            {!! Form::password('password_confirmation', array('placeholder'=>'new password confirmation', 'required'=>'required')) !!}
            {!! Form::submit('Reset Password') !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
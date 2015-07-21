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

        {!! Form::open(array('action' => 'SessionController@store')) !!}
            {!! Form::text('login', null, array('placeholder'=>'Email or Username', 'required'=>'required')) !!}
            {!! Form::password('password', array('placeholder'=>'password', 'required'=>'required')) !!}
            {!! Form::submit('Login') !!}
        {!! Form::close() !!}

        {!! link_to_action('ReminderController@create', 'Forgot Password') !!}
    </div>
</div>
@stop
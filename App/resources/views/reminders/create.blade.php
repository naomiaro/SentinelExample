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

        {!! Form::open(array('action' => 'ReminderController@store')) !!}
            {!! Form::text('login', null, array('placeholder'=>'Email', 'required'=>'required')) !!}
            {!! Form::submit('Get Password Reset') !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
@extends('emails.base_email')

@section('body')

<h3>Welcome to Cycling for Everyone !</h3>

<p>Please <strong><a href="{!! getenv('HOST') !!}/activate_account?token={!! $token !!}">click here to activate</a></strong> your Cycling for Everyone account</p>

@stop

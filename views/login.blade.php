@extends('base')

@section('pagetitle')
  Cycling | Login
@stop

@section('pagecontent')
<div class="row">
  <div class="col-md-2">

  </div>
  <div class="col-md-8">

    <h1>Log In :</h1>

    @include('errormsg')

    <hr>

    <form id="loginform" name="loginform" class="form-horizontal" action="/login" method="post" novalidate>
      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control required email" id="email" name="email" placeholder="yourname@example.com">
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control required" id="password" name="password" placeholder="password">
        </div>
      </div>

      <hr>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-2">

  </div>
</div>
@stop

@section('additionaljs')
    <script>
      $(document).ready(function() {
        $("#loginform").validate({
          rules: {
            password: {
              minlength: 9,
              maxlength: 16
            }
          }
        });
      });
    </script>
@stop

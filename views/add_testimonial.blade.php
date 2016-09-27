@extends('base')

  @section('pagetitle')
    Cycling | Add Testimonial
  @stop

  @section('pagecontent')
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">

      <h1>Add Testimonial :</h1>

      @include('errormsg')

      <hr>

        <form method="post" name="testimonialform" class="form-horizontal" id="testimonialform" action="/add_testimonial" novalidate>
          <input type="hidden" name="_token" value="{!! htmlspecialchars($signer->getSignature()) !!}">
            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control required" id="title" name="title" placeholder="Title">
              </div>
            </div>

            <div class="form-group">
              <label for="testimonial" class="col-sm-2 control-label">Testimonial</label>
              <div class="col-sm-10">
                <textarea class="form-control required" name="testimonial"></textarea>
              </div>
            </div>

            <hr>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary btn-lg">Save Testimonial</button>
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
      $("#testimonialform").validate();
    });
  </script>
@stop

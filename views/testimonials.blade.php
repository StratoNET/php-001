@extends('base')

@section('pagetitle')
  Cycling | Testimonials
@stop

@section('pagecontent')
  <h1>Cycling for Everyone | Testimonials</h1>

  <div class="list-group">
    <a href="#" class="list-group-item active">
      <h4 class="list-group-item-heading">just what Cycling for Everyone users have to say ...</h4>
    </a>

    @foreach ($testimonials as $item)
      @php
        // any need to create 'new' instance of User here, each time through loop ? ... it appears to function ok without it !
        $author = Udemy\models\User::where('id', '=', $item->user_id)->get();
        $fname = $author[0]['attributes']['first_name'];
        $lname = $author[0]['attributes']['last_name'];
      @endphp

      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">{!! $item->title !!}</h4>
        <p class="list-group-item-text" style="text-indent:12px;">posted by <strong>{!! $fname . " " . $lname !!}</strong> on {!! date('D d F Y \a\t H:i T', strtotime($item->created_at)) !!}</p>
        <br/>
        <p class="list-group-item-text">{!! $item->testimonial !!}</p>
      </a>
    @endforeach

  </div>
@stop

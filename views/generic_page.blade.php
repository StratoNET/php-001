@extends('base')

@section('pagetitle')
  {{ $title }}
@stop

@section('pagecontent')
  @if((Udemy\auth\LoggedIn::user()) && (Udemy\auth\LoggedIn::user()->access_level == 1))

    @include('errormsg')

    <form id="editpage" name="editpage" method="post" action="/admin/page/edit" novalidate>
        <section id="editablecontent" class="editablecontent" style="width:100%;height:200px;line-height:2em;">
            {!! $content !!}
        </section>
        <section class="admin-hidden">
          <div class="container">
            @if($page_id == 0)
              <br/>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-4">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter new page title here">
                  </div>
                </div>
              <br/>
            @else
              <br/>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-4">
                    <span>Current page title :</span>
                      <input type="text" class="form-control" id="title" name="title" value="{!! $title !!}" style="margin-top:4px;">
                  </div>
                </div>
              <br/>
            @endif
          </div>
            <br/>
            <button type="button" class="btn btn-primary" onclick="saveEditedPage()">Save</button>
            <button type="button" class="btn btn-info" onclick="turnOffEditing()">Cancel</button>
        </section>
        <input type="hidden" name="editedcontent" id="editedcontent">
        <input type="hidden" name="original" id="original">
        <input type="hidden" name="page_id" value="{!! $page_id !!}">
    </form>
  @else

    @include('errormsg')

    {!! $content !!}

  @endif

@stop

@section('additionaljs')
  @if($page_id == 0)
    <script>
      $(document).ready(function() {
        $("#editpage").load(makePageEditable(this));
      });
    </script>
  @endif
@stop

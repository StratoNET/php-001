@if (isset($_SESSION['curr_seq_err']))
<div class="alert alert-danger alert-dismissable" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong> {!! $_SESSION['curr_seq_err'] !!} </strong>
</div>
@endif

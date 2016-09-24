<!-- navbar spacing from top of page -->
<div class="row">
  <br/>
</div>

<!-- static navbar -->
<nav class="navbar navbar-inverse navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Cycling</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="about_cycling">About</a></li>
        <li><a href="/register">Register</a></li>
        @if(Udemy\auth\LoggedIn::user())
          <li><a href="/logout">Logout</a></li>
        @else
          <li><a href="/login">Login</a></li>
        @endif
        <li><a href="contact_us">Contact</a></li>
  <!--  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>  -->
      </ul>
      <div class="navbar-brand pull-right">
        @if(Udemy\auth\LoggedIn::user())
          {!! $_SESSION['user']->first_name . " " .
              $_SESSION['user']->last_name . " is logged in" !!}
        @else
          {!! "(not logged in)" !!}
        @endif
      </div>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>

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
        <li><a href="contact_us">Contact</a></li>
        <li><a href="/register">Register</a></li>
        <li><a href="/testimonials">Testimonials</a></li>
        @if(Udemy\auth\LoggedIn::user())
          <li><a href="/add_testimonial">Add Testimonial</a></li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if((Udemy\auth\LoggedIn::user()) && (Udemy\auth\LoggedIn::user()->access_level == 1))
          <li class="dropdown">
            <a id="nav-drop" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="nav-drop">
              <li><a href="/admin/page/add">Add new page</a></li>
              <li><a class="menu-item" href="#" onclick="makePageEditable(this)">Edit page content</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">Additional items...</li>
              <li><a href="#">1 ...</a></li>
            </ul>
          </li>
          <li>
            <a href="/logout">
              <span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp;</span>Logout
            </a>
          </li>
        @elseif(Udemy\auth\LoggedIn::user())
          <li>
            <a href="/logout">
              <span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp;</span>Logout
            </a>
          </li>
        @else
          <li>
            <a href="/login">
              <span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp;</span>Login
            </a>
          </li>
        @endif
      </ul>
      <div class="navbar-brand navbar-right">
        @if(Udemy\auth\LoggedIn::user())
          {!! $_SESSION['user']->first_name . " " .
              $_SESSION['user']->last_name !!}
        @endif
      </div>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>

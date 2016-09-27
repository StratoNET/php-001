<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 3 meta tags above MUST come first in the head, any other head content MUST come after these meta tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
      @yield('pagetitle')
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/styles.css">

    @yield('css')

  </head>

  <body>

      <div class="container">

        @include('topnav')

        @yield('pagecontent')

      </div> <!-- /container -->

        <!-- footer -->
      <footer class="footer">
        <div class="container">
          <div class="row-fluid">
            <div class="col-md-12 footer-specific">
                <h4>StratoNET</h4>
                <span class="glyphicon glyphicon-envelope" aria-hidden="true">&nbsp;</span>stratonet&#64;fastmail.net<br/>
                <span class="glyphicon glyphicon-earphone" aria-hidden="true">&nbsp;</span>&#43;44 7733 227500
                <div class="pull-right">
                  <img src="/assets/a_plus.jpg" alt="CompTIA A&#43; certification logo">
                  <img src="/assets/network_plus.jpg" alt="CompTIA Network&#43; certification logo">
                  <span style="margin-left:14px;">&#169; StratoNET Web Development {!! gmdate('Y') !!}</span>
                </div>
            </div>
          </div>
        </div>
      </footer>

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-3.0.0.min.js" integrity="sha256-JklDYODbg0X+8sPiKkcFURb5z7RvlNMIaE3RA2z97vw=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
      <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      @yield('additionaljs')

  </body>
</html>

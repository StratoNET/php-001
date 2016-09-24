<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 3 meta tags above MUST come first in the head, any other head content MUST come after these meta tags -->
    <title>&nbsp;</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
      .footer {
        background-color: black;
        color: white;
        padding-bottom: 12px;
      }
    </style>
  </head>

  <body>

      <div class="container">

        @yield('body')

        <!-- footer -->
        <div class="col-md-12 footer">
            <h4>StratoNET</h4>
            <span class="glyphicon glyphicon-envelope" aria-hidden="true">&nbsp;</span>stratonet&#64;fastmail.net<br/>
            <span class="glyphicon glyphicon-earphone" aria-hidden="true">&nbsp;</span>&#43;44 7733 227500
            <div class="pull-right">
                &#169; StratoNET Web Development {!! gmdate('Y') !!}
            </div>
        </div>

      </div> <!-- /container -->

  </body>
</html>

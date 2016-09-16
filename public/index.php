<?php
include(__DIR__ . "/../bootstrap/start.php");
// $dotenv must be assigned/loaded as follows, as of phpdotenv version >= 2.3
$dotenv = new Dotenv\Dotenv(__DIR__ . "/../");
$dotenv->load();
include(__DIR__ . "/../bootstrap/db.php");
include(__DIR__ . "/../routes.php");

$match = $router->match();

// check $match['target'] is NOT null before using 'explode', to prevent undefined offset error

if (isset($match['target'])) {

  list($controller, $method) = explode("@", $match['target']);

  if (is_callable(array($controller, $method))) {
    $object = new $controller();
    call_user_func_array(array($object, $method), array($match['params']));
  } else {
    echo "Cannot locate $controller -> $method";
  }

}

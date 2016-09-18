<?php
$controller = null;
$method = null;

include(__DIR__ . "/../bootstrap/start.php");
// $dotenv must be assigned/loaded as follows, as of phpdotenv version >= 2.3
$dotenv = new Dotenv\Dotenv(__DIR__ . "/../");
$dotenv->load();
include(__DIR__ . "/../bootstrap/db.php");
include(__DIR__ . "/../routes.php");

$match = $router->match();

// ensure $match['target'] is NOT null* & is a string** before using 'explode'...
// *  to prevent undefined offset error.
// ** to allow for calling of anonymous function as 'target' if NOT a string.
if (isset($match['target']) && is_string($match['target']))
  list($controller, $method) = explode("@", $match['target']);

if ((isset($controller)) && (is_callable(array($controller, $method))))
{
  $object = new $controller();
  call_user_func_array(array($object, $method), array($match['params']));
}
else if (isset($match) && is_callable($match['target']))
{
    call_user_func_array($match['target'], $match['params']);
} else {
  echo "Cannot locate $controller -> $method";
  exit();
}

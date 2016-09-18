<?php

$router->map('GET', '/', 'Udemy\Controllers\PageController@getHomePage', 'home');

$router->map('GET', '/register', 'Udemy\Controllers\RegisterController@getRegisterPage', 'register');

$router->map('POST', '/register', 'Udemy\Controllers\RegisterController@postRegisterPage', 'register_post');

$router->map('GET', '/login', 'Udemy\Controllers\RegisterController@getLoginPage', 'login');

$router->map('GET', '/page_not_found', 'Udemy\Controllers\PageController@get404', '404');

$router->map('GET', '/slug', function() {
  $slug = new Cocur\Slugify\Slugify();
  echo $slug->slugify('About Cycling', '_');
});

$router->map('GET', '[*]', 'Udemy\Controllers\PageController@getPage', 'generic_page');

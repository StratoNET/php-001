<?php

$router->map('GET', '/', 'Udemy\Controllers\PageController@getHomePage', 'home');

$router->map('GET', '/register', 'Udemy\Controllers\RegisterController@getRegisterPage', 'register');

$router->map('POST', '/register', 'Udemy\Controllers\RegisterController@postRegisterPage', 'register_post');

$router->map('GET', '/login', 'Udemy\Controllers\RegisterController@getLoginPage', 'login');

$router->map('GET', '/about', 'Udemy\Controllers\PageController@getPage', 'page');

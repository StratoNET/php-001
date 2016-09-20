<?php

/* ROUTES ... */

// register
$router->map('GET', '/register', 'Udemy\Controllers\RegisterController@getRegisterPage', 'register');
$router->map('POST', '/register', 'Udemy\Controllers\RegisterController@postRegisterPage', 'register_post');

// login/logout
$router->map('GET', '/logout', 'Udemy\Controllers\AuthenticationController@getLogout', 'logout');
$router->map('GET', '/login', 'Udemy\Controllers\AuthenticationController@getLoginPage', 'login');
$router->map('POST', '/login', 'Udemy\Controllers\AuthenticationController@postLoginPage', 'login_post');

// pages
$router->map('GET', '/', 'Udemy\Controllers\PageController@getHomePage', 'home');
$router->map('GET', '/page_not_found', 'Udemy\Controllers\PageController@get404', '404');
$router->map('GET', '/[*]', 'Udemy\Controllers\PageController@getPage', 'generic_page');

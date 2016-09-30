<?php

/* ROUTES ... */

// register
$router->map('GET', '/register', 'Udemy\Controllers\RegisterController@getRegisterPage', 'register');
$router->map('POST', '/register', 'Udemy\Controllers\RegisterController@postRegisterPage', 'register_post');
$router->map('GET', '/activate_account', 'Udemy\Controllers\RegisterController@getActivateAccount', 'activate_account');

// testimonial
$router->map('GET', '/testimonials', 'Udemy\Controllers\TestimonialController@getTestimonials', 'testimonials');

// for registered/logged in users only...
if (Udemy\auth\LoggedIn::user()) {
  //testimonial
  $router->map('GET', '/add_testimonial', 'Udemy\Controllers\TestimonialController@getAddTestimonialPage', 'add_testimonial');
  $router->map('POST', '/add_testimonial', 'Udemy\Controllers\TestimonialController@postAddTestimonialPage', 'add_testimonial_post');
}

// login/logout
$router->map('GET', '/logout', 'Udemy\Controllers\AuthenticationController@getLogout', 'logout');
$router->map('GET', '/login', 'Udemy\Controllers\AuthenticationController@getLoginPage', 'login');
$router->map('POST', '/login', 'Udemy\Controllers\AuthenticationController@postLoginPage', 'login_post');

// administrators only... (access_level 0 is registered/activated (or unactivated) user,
//                         access_level 1 is registered/activated/administrator)
if ((Udemy\auth\LoggedIn::user()) && (Udemy\auth\LoggedIn::user()->access_level == 1)) {
  $router->map('POST', '/admin/page/edit', 'Udemy\Controllers\AdministrationController@postEditedPage', 'save_page');
  $router->map('GET', '/admin/page/add', 'Udemy\Controllers\AdministrationController@getAddNewPage', 'add_page');
}

// pages
$router->map('GET', '/', 'Udemy\Controllers\PageController@getHomePage', 'home');
$router->map('GET', '/page_not_found', 'Udemy\Controllers\PageController@get404', '404');
$router->map('GET', '/[*]', 'Udemy\Controllers\PageController@getPage', 'generic_page');

<?php

/* ROUTES ... */

// register
$router->map('GET', '/register', 'Udemy\controllers\registerController@getRegisterPage', 'register');
$router->map('POST', '/register', 'Udemy\controllers\registerController@postRegisterPage', 'register_post');
$router->map('GET', '/activate_account', 'Udemy\controllers\registerController@getActivateAccount', 'activate_account');

// testimonial
$router->map('GET', '/testimonials', 'Udemy\controllers\testimonialController@getTestimonials', 'testimonials');

// for registered/logged in users only...
if (Udemy\auth\LoggedIn::user()) {
  //testimonial
  $router->map('GET', '/add_testimonial', 'Udemy\controllers\testimonialController@getAddTestimonialPage', 'add_testimonial');
  $router->map('POST', '/add_testimonial', 'Udemy\controllers\testimonialController@postAddTestimonialPage', 'add_testimonial_post');
}

// login/logout
$router->map('GET', '/logout', 'Udemy\controllers\authenticationController@getLogout', 'logout');
$router->map('GET', '/login', 'Udemy\controllers\authenticationController@getLoginPage', 'login');
$router->map('POST', '/login', 'Udemy\controllers\authenticationController@postLoginPage', 'login_post');

// administrators only... (access_level 0 is registered/activated (or unactivated) user,
//                         access_level 1 is registered/activated/administrator)
if ((Udemy\auth\LoggedIn::user()) && (Udemy\auth\LoggedIn::user()->access_level == 1)) {
  $router->map('POST', '/admin/page/edit', 'Udemy\controllers\administrationController@postEditedPage', 'save_page');
  $router->map('GET', '/admin/page/add', 'Udemy\controllers\administrationController@getAddNewPage', 'add_page');
}

// pages
$router->map('GET', '/', 'Udemy\controllers\pageController@getHomePage', 'home');
$router->map('GET', '/page_not_found', 'Udemy\controllers\pageController@get404', '404');
$router->map('GET', '/[*]', 'Udemy\controllers\pageController@getPage', 'generic_page');

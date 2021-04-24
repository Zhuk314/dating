<?php
//Turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//Require autoload file
require_once ('vendor/autoload.php');

// Instance Fat-Free
$f3 = Base::instance();

// Define routes
$f3->route('GET /', function(){
    // Display the home page
    $view = new Template();
    echo $view->render('views/home.html');

});

// Run Fat-Free
$f3->run();
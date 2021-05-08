<?php
// Git hub:
// https://github.com/Zhuk314/dating/commits/main/views/home.html
/*
 * Name: Yurii Zhuk
 * Date: 05/07/2021
 * File Name: index.php
 *
 * This file contains and controls all routing on the dating web site
 */

//Turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//Require autoload file
require_once ('vendor/autoload.php');

//Start session
session_start();

// Instance Fat-Free
$f3 = Base::instance();

// Define default route for home.html page
$f3->route('GET /', function(){
    // Display the home page
    $view = new Template();
    echo $view->render('views/home.html');

});

// Define route for personal_info.html page
$f3->route('GET|POST /personalInfo', function(){

    //Display the personal_info.html page
    $view = new Template();
    echo $view->render('views/personal_info.html');

    // If form submitted, add data to session
    // and move user to the next page
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Test var_dump($_POST)
        //var_dump($_POST);
            //array(5) { ["fname"]=> string(5) "Yurii" ["lname"]=> string(4) "Zhuk"
            // ["age"]=> string(0) "" ["gender"]=> string(4) "male"
            // ["phone"]=> string(10) "2068223839" }

        // Add data to session
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['phone'] = $_POST['phone'];

        // Move user to the next page
        header('location: profile');
    }
});

// Define route for profile.html page
$f3->route('GET|POST /profile', function(){

    //Display the profile.html page
    $view = new Template();
    echo $view->render('views/profile.html');

    // If form submitted, add data to session
    // and move user to the next page
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Test var_dump($_POST)
        //var_dump($_POST);
            //array(4) { ["email"]=> string(22) "iamyuriizhuk@gmail.com"
            // ["state"]=> string(2) "WA" ["seeking"]=> string(4) "male"
            // ["bio"]=> string(7) "test" }

        // Add data to session
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seeking'] = $_POST['seeking'];
        $_SESSION['bio'] = $_POST['bio'];

        // Move user to the next page
        header('location: interests');
    }

});

// Define route for interests.html page
$f3->route('GET|POST /interests', function(){
    //Display the interests.html page
    $view = new Template();
    echo $view->render('views/interests.html');

    // If form submitted, add data to session
    // and move user to the next page
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        /*
        // Test var_dump($_POST)
        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
        */

        // Add data to session
        $_SESSION['interests'] = $_POST['interests'];

        // Move user to the next page
        header('location: summary');
    }


});

// Define route for summary.html page
$f3->route('GET|POST /summary', function(){
    //Display the interests.html page
    $view = new Template();
    echo $view->render('views/summary.html');


});

// Run Fat-Free
$f3->run();
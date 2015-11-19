<?php
session_start();

$exceptions = array('register', 'login');


//Cleans up paths --- SCRIPT_NAME is the path to protected.php

//$page = substr(end(explode('/', $_SERVER['SCRIPT_NAME'])), 0, -4);
//if (in_array($page, $exceptions) === false){   --------------------Breaking it a bit here...



if (in_array($_SERVER['SCRIPT_NAME'], $exceptions) === false){
    if(isset($_SESSION['username']) === false){
        header('Location: login.php');
        die();
    }
}


//The connection to the database

$link = mysqli_connect("127.0.0.1", "root", "", "user_system");

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    echo "Success: A proper connection to MySQL was made! The user_system database is great." . PHP_EOL;
    echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;



//Add info to the database

mysqli_select_db($link, "user_system");



//Include lib files -- file constant always full path to current script -- _FILE_ is path to init.inc.php
//$path = dirname(_FILE_);  // (original next line-->) include("{$path}/user.inc.php");

include("user.inc.php");
?>
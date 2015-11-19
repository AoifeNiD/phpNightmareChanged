<?php

$link = mysqli_connect("127.0.0.1", "root", "", "user_system");

//checks if given username exists in the database
function user_exists($user){

   // REMOVE MYSQL_REAL_ESCAPE -----> $user = mysqli_real_escape_string($user, $_POST['username']);
   $user = array_key_exists('user_name', $_POST) ? $_POST['user_name'] : null;


    // REMOVE MYSQL_QUERY STATEMENT ----> $total = mysql_query("SELECT COUNT..
    $total = "SELECT COUNT('user_id') FROM 'users' WHERE 'user_name' = '{$user}'";

    return (mysql_result($total, 0) == '1') ? true : false;

}


//checks if username and password combination is valid
function valid_credentials($user, $pass){

    $user = mysqli_real_escape_string($user, $_POST['username']);
    $pass = sha1($pass);

     $total = mysql_query("SELECT COUNT('user_id') FROM 'users' WHERE 'user_name' = '{$user}' AND 'user_password' = '{$pass}'");

     return (mysql_result($total, 0) == '1') ? true : false;

}


//adds user to database
function add_user($user, $pass){

    $user = mysqli_real_escape_string($user);
    $pass = sha1($pass);

    mysql_query("INSERT INTO 'users' ('user_name', 'user_password') VALUES ('{$user}', '{$pass}')");
}

?>
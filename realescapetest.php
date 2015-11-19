<?php

//WORKING CONNECTION STATEMENT
 $con=mysqli_connect("localhost","root","","user_system");

// Check connection
 if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }




//THIS WORKS!!!!! (well....no errors) --------------Stack Overflow fix
$id = array_key_exists('user_id', $_POST) ? $_POST['user_id'] : null;
$name = array_key_exists('user_name', $_POST) ? $_POST['user_name'] : null;
$password = array_key_exists('user_password', $_POST) ? $_POST['user_password'] : null;



// escape variables for security ----------- W3Schools version
//$id = mysqli_real_escape_string($con, $_POST['user_id']);
//$name = mysqli_real_escape_string($con, $_POST['user_name']);
//$password = mysqli_real_escape_string($con, $_POST['user_password']);






//STACK OVERFLOW QUERY FIX
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

$query = "INSERT INTO users VALUES (NULL, 'Horrace', 'helloa')";
echo "<pre>Debug: $query</pre>";
$result = mysqli_query($con, $query);
if ( false===$result ) {
  printf("error: %s\n", mysqli_error($con));
}
else {
  echo 'done.';
}






//$sql="INSERT INTO users (user_id, user_name, user_password)
//VALUES ('$id', '$name', '$password')";

//if (!mysqli_query($con,$sql)) {
 // die('Error: ' . mysqli_error($con));
//}
//echo "1 record added";

mysqli_close($con);
 ?>
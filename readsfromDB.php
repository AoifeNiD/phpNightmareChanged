<?php
    $link = mysqli_connect("127.0.0.1", "root", "", "user_system");


    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        die('Not connected : ' .mysql_error());
    }

    echo "Success: A proper connection to MySQL was made! The user_system database is great." . PHP_EOL;
    echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;





$sql = "SELECT user_id, user_name, user_password FROM users";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["user_id"]. " - Name: " . $row["user_name"]. " " . $row["user_password"]. "<br>";
    }
} else {
    echo "0 results";
}





mysqli_close($link);
?>
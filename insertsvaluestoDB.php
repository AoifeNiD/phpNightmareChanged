<?php
$servername = "localhost";
$username = "root";
 $password = "";
$dbname = "user_system";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO users (user_id, user_name, user_password)
     VALUES ('', 'DoeDear', 'femaledeer')";

     // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }

catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

    $sql = "SELECT user_id, user_name, user_password FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["user_id"]. " - Name: " . $row["user_name"]. " " . $row["user_password"]. "<br>";
        }
    } else {
        echo "0 results";
    }


$conn = null;
 ?>
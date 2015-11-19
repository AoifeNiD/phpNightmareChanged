<?php
$link = mysqli_connect("127.0.0.1", "root", "", "user_system");

function generate($password) {
    $password = hash('sha1', $password);
    return $password;
}

function login($link, $email, $password) {
    $password = generate($password);

    $query = mysqli_query($connection, "SELECT `user_name`, `user_password` FROM `members` WHERE `user_name` = '$username' AND `user_password` = '$password'");
    $count = mysqli_num_rows($query); //counting the number of returns

    //if the $count = 1 or more return true else return false
    if($count >= 1) {
        return true;
    } else {
        return false;
    }
}

function exists($link, $detail, $table, $row, $value) {
    $query = mysqli_query($connection, "SELECT `user_id` FROM `users` WHERE `$row` = 'user_id'");
    $count = mysqli_num_rows($query);

    if($count >= 1) {
        return true;
    } else {
        return false;
    }
}

//function detail($link, $detail, $table, $row, $value) {
//    $query = mysqli_query($link, "SELECT `$detail` FROM `$table` WHERE `$row` = '$value'");
//    $associate = mysqli_fetch_assoc($query);

//    return $associate[$detail];
//}

function errors($error) {
    echo '<ul class="error">';
    foreach($error as $fault) {
        echo '<li>'.$fault.'<li>';
    }
    echo '</ul>';
}

function isLoggedIn() {
    if(!empty($_SESSION['logged_in']) && exists($connection, 'user_id', 'users', 'user_id', $_SESSION['logged_in']) == true) {
        return true;
    } else {
        return false;
    }
}

function logout() {
    unset($_SESSION['logged_in']);
}

if($_POST) {
    $username = mysqli_real_escape_string($connect, strip_tags($_POST['user_name']));
    $password = mysqli_real_escape_string($connect, strip_tags($_POST['user_password']));

    if(!empty($username) && !empty($password)) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = 'Your name: '.$username.' is not valid';
        }

        if(exists($connection, 'user_name', 'users', 'username') == false) {
            $error[] = 'You are not registered';
        }

        if(detail($connection, 'active', 'users', 'email', $email) != 1) {
            $error[] = 'Your account is not activated';
        }

        if(empty($error)) {
            $query = login($connection, $email, $password);

            if($query == true) {
                $_SESSION['logged_in'] == detail($connection, 'id', 'members', 'email', $email);
            }
        }
    } else {
        $error[] = 'There are empty fields';
    }

    if(!empty($error)) {
        echo errors($error);
    }
}
?>

//http://stackoverflow.com/questions/23834071/use-sql-to-check-if-user-exists-in-database
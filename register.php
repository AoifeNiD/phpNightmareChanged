<?php
include('init.inc.php');

$errors = array();

if (isset($_POST['username'], $_POST['password'], $_POST['repeat_password'])){

    if (empty($_POST['username'])){
        $errors[] = 'The username cant be empty.';
    }

    if (empty($_POST['password']) || empty($_POST['repeat_password'])){
        $errors[] = 'The password cant be empty.';
    }

    if ($_POST['password'] !== $_POST['repeat_password']){
        $errors[] = 'Password verification failed.';
    }

    if (user_exists($_POST['username'])){
        $errors[] = 'Username already taken.';
    }

    if (empty($errors)){
        add_user($_POST['username'], $_POST['password']);

        $_SESSION['username'] = htmlentities($_POST['username']);

        header('Location: protected.php');
        die();
    }
}


?>

<!DOCTYPE html>
    <html lang="en">

        <head>
            <mete http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>register</title>
        </head>

    <body>

        <div>
            <?php
                if (empty($errors) === false){
                    ?>
                    <ul>
                       <?php
                            foreach ($errors as $error){
                                echo "<li>{$error}</li>";
                            }
                       ?>
                    </ul>
                    <?php
                }
            ?>
        </div>

    <form action="" method="POST">
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php if (isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" />
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="text" name="password" id="password" />
        </p>
        <p>
            <label for="repeat_password">Repeat Password::</label>
            <input type="text" name="repeat_password" id="repeat_password" />
        </p>
        <p>
             <input type="submit" value="Register" />
        </p>
    </form>

</body>
</html>
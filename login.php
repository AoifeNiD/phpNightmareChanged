<?php

            ?>

<!DOCTYPE html>
    <html lang="en">

        <head>
            <mete http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>login</title>
        </head>

<body>

        <p>
            Need an account? <a href="register.php">Register here.</a>
        </p>
 <form action="" method="POST">
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" />
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="text" name="password" id="password" />
        </p>
        <p>
             <input type="submit" value="Login" onclick="message" />
             <div id="display"></div>
        </p>
    </form>

<script>
function message(){
   document.getElementById("display").innerHTML = "working";


}
</script>

</body>
</html>
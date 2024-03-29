<?php
if (isset($_POST["signup-submit"])) {
    include "env.php";
    if (mysqli_connect_errno()){
        echo mysqli_connect_error();
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sqlToCreateUser = "INSERT INTO users "
            . "(username, email, password) "
            . "VALUES ("
            ."'".$username."',"
            ."'".$email."',"
            ."'".$password
            ."')";

        mysqli_query($mysqli_connection, $sqlToCreateUser);
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tikrainefacebook</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="title">tikrainefacebook.com</h2>
        <div class="form-block">
            <form action="index.php" method="POST">
                <div class="field">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="your_username">
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="at least 8 characters">
                </div>
                <input type="submit" name="login-submit" value="Login">
                <div class="action-block">
                    <a class="primary-action" href="register.php">Sign up!</a>
                    <a class="primary-action" href="#todo">Forgot password?</a>
                </div>
            </form>
            <img src="img/login.png" alt="Login Image">
        </div>
        <footer>
            <p>&#169; 2021 Aleksanda Caj, Daiva Baltranaitė, Kęstutis Svetikas, Osvaldas Ulevičius</p>
        </footer>
    </div>
</body>
</html>

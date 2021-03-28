<?php
if (isset($_POST['login-submit'])) {
    include "env.php";
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    } else {
        $user = $_POST['username'];
        $enteredPassword = $_POST['password'];
        $sqlQueryUser = "SELECT password FROM users WHERE username=\"" . $user . "\"";
        $result = mysqli_query($mysqli_connection, $sqlQueryUser);
        $password = $result->fetch_assoc()['password'];
        if ($enteredPassword == $password) {
            setcookie('username', $user, time() + (60 * 60 * 4));
            setcookie('password', $password, time() + (60 * 60 * 4));
        } else {
            echo 'Login failed';
        }
    }
}

if (isset($_COOKIE['username'])) {
    include "env.php";
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    } else {
        $sqlQueryUser = "SELECT * FROM users WHERE username=\"" . $_COOKIE['username'] . "\"";
        $result = mysqli_query($mysqli_connection, $sqlQueryUser);
        $userData = $result->fetch_assoc();
        if ($userData['password'] == $_COOKIE['password']) {
            $userId = $userData['user_id'];
        }
    }
}

if (isset($_POST["post-submit"])) {
    include "env.php";
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
    } else {
        $content = filter_input(INPUT_POST, "content");
        $postDate = date("Y-m-d");
        $sqlToInsertDataPosts = "INSERT INTO posts "
            . "(user, content, post_date) "
            . "VALUES ("
            . "'" . $userId . "',"
            . "'" . $content . "',"
            . "'" . $postDate
            . "')";
        mysqli_query($mysqli_connection, $sqlToInsertDataPosts);
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
    <?php if (!isset($userId)) { ?>
        <div class="welcome-block">
            <h2 class="title">tikrainefacebook.com</h2>
            <p>
                Already have an account?
                <a href="login.php" class="primary-action">Sign In!</a>
            </p>
            <p>
                Don't have an account yet?
                <a href="register.php" class="primary-action">Register!</a>
            </p>
            <img src="img/welcome.png" alt="Welcome Image">
        </div>
    <?php } ?>
    <?php
    include "header.html";
    include "env.php";
    $sqlGetPosts = "SELECT * FROM posts ORDER BY post_date DESC";
    $postsResults = mysqli_query($mysqli_connection, $sqlGetPosts);
    if ($postsResults) {
        while ($row = mysqli_fetch_array($postsResults, MYSQLI_ASSOC)) {
            $sqlGetPostUser = "SELECT * FROM users WHERE user_id = " . $row["user"] . "";
            $getPostUser = mysqli_query($mysqli_connection, $sqlGetPostUser);
            $postUser = mysqli_fetch_array($getPostUser, MYSQLI_ASSOC);
            ?>
            <!--    TODO else statement if the user is logged in show posts-->
            <div class="post-block-container">
                <!--        TODO if user has profile picture, display it, else show default profile picture-->
                <img src="img/profile.png" alt="Profile image">
                <div class="post-block">
                    <div>
                        <h4><?php echo $row["post_date"] ?></h4>
                        <h2><?php echo isset($postUser["username"]) ? $postUser["username"] : "Unkown user" ?></h2>
                    </div>
                    <div class="post-block-body">
                        <p>
                            <?php echo $row["content"] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    include "footer.html";
    ?>
</div>
</body>
</html>

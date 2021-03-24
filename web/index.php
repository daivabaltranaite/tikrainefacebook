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
<!--    TODO PLACE welcome-block in if statement if the user is not logged in!!! -->
        <div class="welcome-block">
            <h2 class="title">tikrainefacebook.com</h2>
            <p>
                Already have an account? 
                <a href="login.html" class="primary-action">Sign In!</a>
            </p>
            <p>
                Don't have an account yet? 
                <a href="register.html" class="primary-action">Register!</a>
            </p>
            <img src="img/welcome.png" alt="Welcome Image">
        </div>
        <?php
            include "env.php";
            $sqlGetPosts = "SELECT * FROM posts ORDER BY post_date DESC";
            $postsResults = mysqli_query($mysqli_connection, $sqlGetPosts);
            if ($postsResults) {
                while ($row = mysqli_fetch_array($postsResults, MYSQLI_ASSOC)){
                    $sqlGetPostUser = "SELECT * FROM users WHERE user_id = ".$row["user"]."";
                    $getPostUser = mysqli_query($mysqli_connection, $sqlGetPostUser);
                    $postUser = mysqli_fetch_array($getPostUser, MYSQLI_ASSOC);
        ?>
<!--    TODO else statement if the user is logged in show posts-->
        <div class="post-block-container">
<!--        TODO if user has profile picture, display it, else show default profile picture-->
            <img src="img/profile.png" alt="Profile image">
            <div class="post-block">
                <div>
                    <h4><?php echo $row["post_date"]?></h4>
                    <h2><?php echo $postUser["username"]?></h2>
                </div>
                <div class="post-block-body">
                    <p>
                        <?php echo $row["content"]?>
                    </p>
                </div>
            </div>
        </div>
        <?php
                }
            }
        ?>
        <footer>
            <p>&#169; 2021 Aleksanda Caj, Daiva Baltranaitė, Kęstutis Svetikas, Osvaldas Ulevičius</p>
        </footer>
    </div>
</body>
</html>

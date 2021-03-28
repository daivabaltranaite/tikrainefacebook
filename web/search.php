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
    <?php
    include "header.html";

    ?>
<h1>Search page</h1>


    <?php
    include "env.php";

    if(isset($_POST['submit-search'])){
        $search = mysqli_real_escape_string($mysqli_connection, $_POST['search']);
        $sql= "SELECT * FROM posts WHERE content LIKE '%$search%' OR user LIKE '%$search%' OR post_date LIKE '%$search%'";
        $result =mysqli_query($mysqli_connection,$sql);

        $queryResult = mysqli_num_rows($result);

        echo "<p>There are ".$queryResult." results!</p>";

        if ($queryResult >0) {
            while($row=mysqli_fetch_assoc($result)) {

                $sqlGetPostUser = "SELECT * FROM users WHERE user_id = " . $row["user"] . "";
                $getPostUser = mysqli_query($mysqli_connection, $sqlGetPostUser);
                $postUser = mysqli_fetch_array($getPostUser, MYSQLI_ASSOC);


                echo "<div class='post-block-container'>
                <img src='img/profile.png' alt='Profile image'>
                <div class='post-block'>
                    <div>
                        <h4>".$row['post_date']."</h4>
                        <h2>".$postUser['username']."</h2>
                    </div>
                    <div class='post-block-body'>
                        <p>".$row['content']."</p>
                    </div>
                </div>
            </div>";
            }
        } else {
            echo "<p>There are no results maching your search!</p>";
        }
    }

     include "footer.html"; ?>
</div>
</body>
</html>
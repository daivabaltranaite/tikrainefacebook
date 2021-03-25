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
                    <label for="content">Write a new post:</label>
                    <textarea name="content" rows="10" style="width: 100%;"></textarea>
                </div>
                <input type="submit" name="post-submit" value="Publish Post">
            </form>
            <img src="img/post.png" alt="Login Image">
        </div>
        <?php
            include "footer.html";
        ?>
    </div>
</body>
</html>

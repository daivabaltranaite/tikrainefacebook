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
            <form action="login.php" method="POST">
                <div class="field">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Your Username">
                </div>
                <div class="field">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" placeholder="your_email@example.com">
                </div>
                <div class="field">
                    <label for="password">Create password</label>
                    <input type="password" name="password" placeholder="at least 8 characters" id="password">
                </div>
                <div class="field">
                    <label for="password-repeat">Repeat new password</label>
                    <input type="password" name="password-repeat" placeholder="at least 8 characters" id="password-repeat">
                </div>
                <input type="submit" name="signup-submit" value="Sign Up">
                <div class="action-block">
                    <a class="primary-action" href="login.php">Log In!</a>
                    <a class="primary-action" href="#TODO">Forgot password?</a>
                </div>
            </form>
            <img src="img/register.png" alt="Login Image">
        </div>
        <footer>
            <p>&#169; 2021 Aleksanda Caj, Daiva Baltranaitė, Kęstutis Svetikas, Osvaldas Ulevičius</p>
        </footer>
    </div>
    <script src="register.js"></script>
</body>
</html>

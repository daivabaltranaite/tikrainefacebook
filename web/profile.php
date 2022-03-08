<?php
//Validation

if (empty($_SESSION['username'])) { //Nezinau tikslaus SESSION pavadinimo, gali tekti pakeisti veliau.
   header ('Location: login.html');
}

include "env.php";

$profileId = "";  //kintamasis kurio reiksme USERNAME i kurio profili uzeinama.

if (mysqli_connect_errno()) {

    printf("Failed to connect to MySQL: ", mysqli_connect_error());
    exit();

} else {

    $sql = "SELECT name, surname, email, registration_date, about_user, profile_picture FROM users WHERE username= '" . $profileId . "'";
    $res = mysqli_query($mysqli_connection, $sql);
    $profileInfo = mysqli_fetch_array($res, MYSQLI_ASSOC);

//    Profile image

    $profileImage = $profileInfo['profile_picture'];
    if ($profileImage == null) {
        $profileImage = "img/profile.png";
    }

//    Profile info:

    $profileName = $profileInfo['name'];
    if ($profileName == null) {
        $profileName = "------";
    }
    $editName = $profileName;

    $profileSurname = $profileInfo['surname'];
    if ($profileSurname == null) {
        $profileSurname = "------";
    }
    $editSurname = $profileSurname;

    $profileEmail = $profileInfo['email'];

    $profileRegDate = $profileInfo['registration_date'];
    if ($profileRegDate == null) {
        $profileRegDate = "------";
    }

    $profileAboutMe = $profileInfo['about_user'];
    if ($profileAboutMe == null) {
        $profileAboutMe = "------";
    }
    $editAboutMe = $profileAboutMe;
}

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tikrainefacebook</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
<img class="profile-background-image" src="img/register.png" alt="Profile background">
<div class="container">
    <h2 class="title">tikrainefacebook.com</h2>
    <div class="image-and-info">

        <div class="profile-image-container">
            <img class="profile-image" src="<?php echo $profileImage;?>" alt="Profile image">
            <form action="" method="post">

        <?php
        if ($profileId === $_SESSION['username']) {

           echo "<input type='text' name='profile-picture-url' placeholder='Insert your image URL'></input>";
           echo "<input type='submit' name='set-picture' value='Set new profile picture'></input>";
           echo "<input type='submit' name='remove-picture' value='Remove profile picture'></input>";
           echo "<input type='submit' name='change-profile-info' value='Change profile details'></input>";
       }
       ?>
           </form>
       </div>

       <?php

       if (isset($_POST['set-picture'])){
           $sql = "UPDATE users SET profile_picture= '" . ($_POST['profile-picture-url']) . "' WHERE username= '" . $profileId . "'";
           $res = mysqli_query($mysqli_connection, $sql);
       }

       if (isset($_POST['remove-picture'])){

           $sql = "UPDATE users SET profile_picture= NULL WHERE username= '" . $profileId . "'";
           $res = mysqli_query($mysqli_connection, $sql);
       }

       if (isset($_POST['change-profile-info'])){

           $profileName = "<form action='' method='POST'><input class='table-form-input-text' type='text' name='profile-name' placeholder='Insert your name'></input>";
           $profileSurname = "<input class='table-form-input-text' type='text' name='profile-surname' placeholder='Insert your surname'></input>";
           $profileAboutMe = "<textarea class='table-form-textarea' name='profile-about' placeholder='Write something about yourself'></textarea>";


       }
       ?>

       <div class="profile-info-container">
           <h3>Profile details</h3>
           <table class="profile-info">
               <tr>
                   <td><h4>Name:</h4></td>
                   <td class="profile-info-name"><?php echo $profileName;?></td>
               </tr>
               <tr>
                   <td><h4>Surname:</h4></td>
                   <td class="profile-info-surname"><?php echo $profileSurname;?></td>
               </tr>
               <tr>
                   <td><h4>Email:</h4></td>
                   <td class="profile-info-email"><?php echo $profileEmail;?></td>
               </tr>
               <tr>
                   <td><h4>Registration-date:</h4></td>
                   <td class="profile-info-reg-date"><?php echo $profileRegDate;?></td>
               </tr>
               <tr>
                   <td><h4>About me:</h4></td>
                   <td class="profile-info-about"><?php echo $profileAboutMe;?></td>
               </tr>
           </table>


               <?php if (isset($_POST['change-profile-info'])){

                   echo "<input class='profile-info-container-submit' type='submit' name='profile-edit' value='Save profile details'></input>";
                   echo "<input class='profile-info-container-submit' type='submit' name='cancel-edit' value='Cancel editting'></input></form>";
               }
               ?>

           <form class="back-button-form" action='' method='POST'>
               <input class="back-button" type="submit" name="back" value="Back to main page">
           </form>

           <?php
           if (isset($_POST['profile-edit'])){


               if (isset($_POST['profile-name'])) {
                   $editName = $_POST['profile-name'];
               }

               if (isset($_POST['profile-surname']) && ($_POST['profile-surname'] !== "")) {
                   $editSurname = $_POST['profile-surname'];
               }

               if (isset($_POST['profile-about']) && ($_POST['profile-about'] !== "")) {
                   $editAboutMe = $_POST['profile-about'];
               }

               $sql = "UPDATE users SET name= '" . $editName . "', surname= '" . $editSurname . "', about_user= '" . $editAboutMe . "' WHERE username= '" . $profileId . "'";
               $res = mysqli_query($mysqli_connection, $sql);
           }

           if (isset($POST['back'])) {
               header('Location: login.php');
           }

           mysqli_close($mysqli_connection);
           ?>
       </div>

   </div>
</div>
</body>
</html>

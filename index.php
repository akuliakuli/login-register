<?php
    include 'includes/autoload.inc.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup/signin page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <ul class ='header-menu'>
            <li class= 'header-menu-item'>Alex Geladze</li>
            <li class= 'header-menu-item'><a href ="#">Home</a></li>
            <li class= 'header-menu-item'><a href ="#">About</a></li>
            <li class= 'header-menu-item'><a href ="https://github.com/akuliakuli" target="_blank">Github</a></li>
        </ul>
        <!-- if(isset($_SESSION['userid'])){

}
    ?>
     -->
        <div class="users-info">
            <?php
            if(isset($_SESSION['userid']))
            {
            ?>
            <a><?php echo $_SESSION['username']?></a>
            <a href ='includes/logout.inc.php' class ='head-btn'>Logout</a>
            <?php
            }
            else
            {
            ?>
                <a>SIGN Up</a>
                <button class ='head-btn'>Logout</a>
            <?php
            }
            ?>
        </div>
    </header>
    <div class="main-text-container">
        <img src ="img/moon.png" class ='moon-img'>
        <div class="text-descr">
            <h1>Login Register Webpage</h1>
            <p>Page with login/register system,checks inputs with many validations</p>
        </div>
    </div>
    <h1>
      <?php

      ?>
    </h1>
    <div class="forms-container">
        <form action="includes/signup.inc.php" method="post" id="signup-form">
            <h1>Doesnt Have an account yet?Sign up Here</h1>
            <input type="text" name="userNm" placeholder="Username">
            <input type ="password" name = 'pwd' placeholder="Password">
            <input type ="password" name = 'pwdrepeat' placeholder="Repeat password">
            <input type ="email" name = 'email' placeholder="E-mail">
            <button type="submit" name ='submit' class ='form-btn'>SIGN UP</button>
        </form>
        <form action="includes/login.inc.php" method="post" id="signin-form">
            <h1>Already have an account,sign in here</h1>
            <input type="text" name = 'userNm' placeholder="Username">
            <input type ="password" name = 'pwd'placeholder="Password">
            <button type="submit" name ='submit' class ='form-btn secbtn'>SIGN UP</button>
        </form>
    </div>
</body>
</html>
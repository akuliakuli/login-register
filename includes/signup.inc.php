<?php
    include 'autoload.inc.php';


if(isset($_POST['submit'])){
    $userName = $_POST['userNm'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $userEmail = $_POST['email'];

    $signup = new Signupcontr($userName,$pwd,$pwdRepeat,$userEmail);

    $signup->signupUser();

    header("location:../index.php?error=none");
}
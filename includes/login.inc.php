<?php

include 'autoload.inc.php';

if(isset($_POST['submit'])){
    $username = $_POST['userNm'];
    $pwd = $_POST['pwd'];
    
    $login  = new Logincontr($username,$pwd);

    $login->loginUser();

    header("location:../index.php?error=none");

}
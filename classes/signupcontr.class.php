<?php

class Signupcontr extends Signup{
    private $userName;
    private $pwd;
    private $pwdrepeat;
    private $userEmail;
    public function __construct($username,$pwd,$pwdrep,$email)
    {
        $this->userName = $username;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrep;
        $this->userEmail = $email;
    }

    public function signupUser(){
        if($this->ifEmpty() == false){
            // echo 'Empty input'
            header("location:../index.php?error=inputisepmty");
            exit();
        }
        if($this->samePwd() == false){
            // echo 'different passwords typed'
            header("location:../index.php?error=passwordsaredifferent");
            exit();
        }
        if($this->invalidUserName() == false){
            // echo 'wrong symbols written in username';
            header("location:../index.php?error=wrongtypeofusername");
            exit();
        }
        if($this->invalidEmail() == false){
            //echo'wrong type of email'
            header("location:../index.php?error=wrongtypeemail");
            exit();
        }
        if($this->alreadyExistUser() == false){
            // echo 'this user already exists'
            header("location:../index.php?error=thisuseralreadyexist");
            exit();
        }
        $this->insertUser($this->userName,$this->pwd,$this->userEmail);
    }
    private function ifEmpty(){
    
        if(empty($this->userName) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->userEmail)){
            $res = false;
        }else{
            $res = true;
        }
        return $res;
    }
    private function samePwd(){
        if($this->pwd == $this->pwdrepeat){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }
    private function invalidUserName(){
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->userName)){
            $res = false;
        }else{
            $res = true;
        }
        return $res;
    }
    private function invalidEmail(){
        if(!filter_var($this->userEmail,FILTER_VALIDATE_EMAIL)){
            $res = false;
        }else{
            $res = true;
        }
        return $res;
    }
    private function alreadyExistUser(){
        if(!$this->checkUser($this->userName,$this->userEmail)){
            $res = false;
        }else{
            $res = true;
        }
        return $res;
    }
}
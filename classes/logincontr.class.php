<?php

class Logincontr extends Login{
    private $userName;
    private $pwd;
    public function __construct($username,$pwd)
    {
        $this->userName = $username;
        $this->pwd = $pwd;
    }
    public function loginUser(){
        if($this->ifEmpty() == false){
            // echo 'Empty input'
            header("location:../index.php?error=inputisepmty");
            exit();
        }
        $this->getUser($this->userName,$this->pwd);
    }
    private function ifEmpty(){
    
        if(empty($this->userName) || empty($this->pwd)){
            $res = false;
        }else{
            $res = true;
        }
        return $res;
    }
}
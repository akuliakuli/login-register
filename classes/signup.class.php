<?php

class Signup extends Dbh{
   protected function checkUser($name,$email){
        $sql = 'SELECT * FROM page_users WHERE users_name = ? AND users_email = ?';
        $stmt = $this->connect() -> prepare($sql);

        if(!$stmt->execute([$name,$email]) ){
            $stmt = null;
            header('location:../index.php?error=stmtfailed');
            exit();
        }
        
        if($stmt->rowCount() > 0){
            return false;
        }else{
            return true;
        }
   }
   protected function insertUser($username,$pwd,$email){
        $sql = "INSERT INTO `page_users`(`users_name`, `users_pwd`, `users_email`) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);

        $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
        
        if(!$stmt->execute([$username,$hashedPwd,$email]) ){
            $stmt = null;
            header('location:../index.php?error=stmtfailed');
            exit();
        }
   }
}
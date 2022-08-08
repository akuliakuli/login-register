<?php

class Login extends Dbh{
    public function getUser($userName,$pwd){
        $sql = 'SELECT users_pwd FROM page_users WHERE users_name = ? OR users_email = ?';
        $stmt = $this->connect()->prepare($sql);

        if($stmt->execute([$userName,$pwd]) === false){
            $stmt = null;
            header("location:../index.php?error=connectionerror");
            exit();
        }
        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location:../index.php?error=suchuserdoesntexist");
            exit();
        }

        $pwdHashed = $stmt->fetchAll();
        $checkPwd = password_verify($pwd,$pwdHashed[0]['users_pwd']);

        if($checkPwd == false){
            $stmt = null;
            header("location:../index.php?error=wrongpassword");
            exit();
        }elseif($checkPwd == true){
            $sql = 'SELECT * FROM page_users WHERE users_name = ? OR users_email = ? AND users_pwd =?';
            $stmt = $this->connect()->prepare($sql);


            if($stmt->execute([$userName,$userName,$pwd]) === false){
                $stmt = null;
                header("location:../index.php?error=connectionerror");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location:../index.php?error=suchuserdoesntexist");
                exit();
            }
            $user = $stmt->fetchAll();

            session_start();

            $_SESSION['userid'] = $user[0]['users_id'];
            $_SESSION['username'] = $user[0]['users_name'];
            $stmt = null;

        }
    }
}
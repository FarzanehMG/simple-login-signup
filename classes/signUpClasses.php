<?php

class signUp extends dbConection
{
    protected function setUser($username , $email , $password){
        $sql = "INSERT INTO users (U_name , email, pass) VALUES (?,?,?)";
        $hashPass = password_hash($password , PASSWORD_DEFAULT);
        $stmt = $this->conection()->prepare($sql);
        if(!$stmt->execute([$username , $email , $hashPass])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null ;
    }

    protected function checkUser($username , $email){
        $sql = "SELECT U_name FROM users WHERE U_name=? OR email=?";
        $stmt = $this->conection()->prepare($sql);
        
        if(!$stmt->execute([$username , $email])){
            $stmt = null ;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() > 0){
            $resultCheck = false ;
        }else{
            $resultCheck = true ;
        }
        return $resultCheck ;
    }
}
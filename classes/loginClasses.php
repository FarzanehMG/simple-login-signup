<?php

class logIn extends dbConection 
{
    protected function getUser($email , $password){
        $sql = "select * from users where email = ? OR U_name = ?";
        $stmt = $this->conection()->prepare($sql);

        if(!$stmt->execute([$email , $password]))
        {
            $stmt = null ;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0)
        {
            $stmt = null ;
            header("location: ../index.php?error=userNotFound");
            exit();
        }

        $hashedPass = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPass = password_verify($password , $hashedPass[0]["pass"]);

        if($checkPass == false){
            $stmt = null ; 
            header("location: ../index.php?error=failedPass");
            exit();
        }
        elseif($checkPass == true)
        {
            $sql = "select * from users where email = ? OR U_name = ? AND pass = ?";
            $stmt = $this->conection()->prepare($sql);
            if(!$stmt->execute([$email , $email , $password ]))
            {
                $stmt = null ; 
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount() == 0)
            {
                $stmt = null ; 
                header("location: ../index.php?error=notFoundUser");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['uid'] = $user[0]["id"];
            $_SESSION['uname'] = $user[0]["name"];
            $stmt = null ;
        }
    }

    

}

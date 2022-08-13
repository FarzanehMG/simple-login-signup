<?php


class signControl extends signUp
{
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function signupUser()
    {
        if($this->emptyInput() == false){
            header("location: ../index.php?error=emptyinput");
            exit();
        }

       if($this->invalidEmail() == false){
            header("location: ../index.php?error=invalidEmail");
            exit();
        }

        if($this->invalidUsername() == false){
            header("location: ../index.php?error=invalidUsername");
            exit();
        }
        if($this->userTakenCheck() == false){
            header("location: ../index.php?error=userTakenCheck");
            exit();
        }

        $this->setUser($this->username, $this->email , $this->password );
    }

    private function emptyInput()
    {
        if (empty($this->username) || empty($this->password) || empty($this->email)) {
            $result = false ;
        } else {
            $result = true ;
        }

        return $result ;
    }

    private function invalidEmail()
    {
        /*$checkEmail = filter_var($this->email, FILTER_VALIDATE_EMAIL);*/
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false ;
        } else {
            $result = true ;
        }

        return $result ;
    }

    private function invalidUsername()
    {
        /*$checkUsername = preg_match("/^[a-zA-Z0-9]*$/", $this->username);*/
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false ;
        }else{
            $result = true ;
        }

        return $result ;
    }

    private function userTakenCheck()
    {
        if(!$this->checkUser($this->username, $this->email)){
            $result = false ;
        }else{
            $result = true ;
        }
        return $result ;
    }


}

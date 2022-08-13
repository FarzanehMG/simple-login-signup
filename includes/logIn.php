<?php

if(isset($_POST['submit']))
{
    //Grabbing the data
    $email = $_POST['email'];
    $pass = $_POST['password'];

    //Instantiate signupcontroller class
    include "../classes/dbClasses.php";
    include "../classes/loginClasses.php";
    include "../classes/loginControlClasses.php";

    $loginControl = new loginController($email, $pass);

    //Running error handlers & user signup
    $loginControl->LoginUsers();

    //Going to back to front page
    header("location: ../index.php?error=noting");
}
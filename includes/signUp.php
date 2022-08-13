<?php


if(isset($_POST['submit']))
{
    //Grabbing the data
    $username = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Instantiate signupcontroller class
    include "../classes/dbClasses.php";
    include "../classes/signUpClasses.php";
    include "../classes/signControlClasses.php";

    $signupControl = new signControl($username, $email, $password);

    //Running error handlers & user signup
    $signupControl->signupUser();

    //Going to back to front page
    header("location: ../index.php?error=none");
}
<?php 
if(isset($_POST['submit'])){
    $email= stripslashes( htmlspecialchars($_POST['email']));
    $password= stripslashes( htmlspecialchars($_POST['password']));
    $confirm_password= stripslashes( htmlspecialchars($_POST['confirm_password']));

    include "../classes/connect.php";
    include "../classes/signup/signup.db.php";
    include "../controller/signup.controller.php";
    
    $signup= new signup_controller($email, $password, $confirm_password);
    $signup->signupUser();
}
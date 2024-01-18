<?php 
if(isset($_POST['submit'])){
    $email=stripslashes(htmlspecialchars($_POST['email']));
    $password=stripslashes(htmlspecialchars($_POST['password']));
    
    include "../classes/connect.php";
    include "../classes/login/login.db.php";
    include "../controller/login_controller.php";

    $login= new login_controller($email, $password);
    $login->Isloged();
}
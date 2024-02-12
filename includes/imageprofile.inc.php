<?php
    include "../classes/connect.php";
    include '../classes/customers/bookmovie.php';
    include "../controller/imageprofile_controller.php";
if(isset($_POST['submit'])){
    $image=$_FILES["image"]["name"];
    $user_id=stripslashes(htmlspecialchars($_POST["user_id"]));





    $updatecoverpicture= new Imageprofile_controller($image, $user_id);
    $updatecoverpicture->updatecover();

}
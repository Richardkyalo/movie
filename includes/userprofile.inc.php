<?php
include '../classes/connect.php';
include '../classes/customers/bookmovie.php';
include '../controller/customerprofile_controller.php';
 if(isset($_POST['submit'])){
    $firstname=stripslashes(htmlspecialchars($_POST['firstname']));
    $user_id=stripslashes(htmlspecialchars($_POST['user']));
    $secondname=stripslashes(htmlspecialchars($_POST['secondname']));
    $address=stripslashes(htmlspecialchars($_POST['address']));
    $town=stripslashes(htmlspecialchars($_POST['town']));
    $street=stripslashes(htmlspecialchars($_POST['street']));
    $phone=stripslashes(htmlspecialchars($_POST['phone']));
    $email=stripslashes(htmlspecialchars($_POST['email']));

    $update = new customerprofile_controller(
        $firstname,
        $secondname,
        $address,
        $town,
        $street,
        $phone,
        $email,
        $user_id
    );
    $update->updateUser();
    // $update= new userprofile_controller;
    // $update->updateUser();

 }

 class userprofile {
    public function getuserdata($user_id) {
        $adminProfileInstance = new customer();
        $userDetails = $adminProfileInstance->getCustomerDetails($user_id);
        return $userDetails;   
    }
}
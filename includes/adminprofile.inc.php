<?php
 include "../classes/connect.php";
 include "../classes/admins/adminprofile.db.php";
 include "../controller/adminprofile.controller.php";
 $email="";
if (isset($_POST['submit'])) {
    $firstname = stripslashes(htmlspecialchars($_POST['firstname']));
    $secondname = stripslashes(htmlspecialchars($_POST['secondname']));
    $address = stripslashes(htmlspecialchars($_POST['address']));
    $town = stripslashes(htmlspecialchars($_POST['town']));
    $street = stripslashes(htmlspecialchars($_POST['street']));
    $theatre = stripslashes(htmlspecialchars($_POST['theatre']));
    $phone = stripslashes(htmlspecialchars($_POST['phone']));
    $email = stripslashes(htmlspecialchars($_POST['email']));

   
    $update = new Adminprofile_controller(
        $firstname,
        $secondname,
        $address,
        $town,
        $street,
        $theatre,
        $phone,
        $email
    );
    $update->updateUser();
    // Fetch updated user details
    $adminProfileInstance = new adminprofile();
    $userDetails = $adminProfileInstance->getUserDetails($email);
}
class profile {
    public function getuserdata($email) {
        $adminProfileInstance = new adminprofile();
$userDetails = $adminProfileInstance->getUserDetails($email);
return $userDetails;   
    }
}


<?php
 include "../classes/connect.php";
 include "../classes/admins/adminprofile.db.php";
 include "../controller/adminprofile.controller.php";
 include "../controller/profile_controller.php";
 $email="";
 if(isset($_POST["Submit"])){
    $email = stripslashes(htmlspecialchars($_POST['email']));
    $image=$_FILES['images']['name'];
    $image_size=$_FILES['images']['size'];

    $image_update= new profile_controller($email, $image, $image_size);
     $update->updateUser();
 }
if (isset($_POST['submit'])) {
    $firstname = stripslashes(htmlspecialchars($_POST['firstname']));
    $secondname = stripslashes(htmlspecialchars($_POST['secondname']));
    $address = stripslashes(htmlspecialchars($_POST['address']));
    $town = stripslashes(htmlspecialchars($_POST['town']));
    $street = stripslashes(htmlspecialchars($_POST['street']));
    $theatre = stripslashes(htmlspecialchars($_POST['theatre']));
    $phone = stripslashes(htmlspecialchars($_POST['phone']));
    $email = stripslashes(htmlspecialchars($_POST['email']));
    $image=$_FILES['images']['name'];
    $image_size=$_FILES['images']['size'];
   
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
class users {
    public function getAllUserDetails() {
        $allUserdetails= new adminprofile();
        $users = $allUserdetails->getAllUsers();
        return $users;
    }
}
class theatres {
    public function getAllTheatreDetails() {
        $allTheatredetails= new adminprofile();
        $theatres = $allTheatredetails->getAllTheatreDetails();
        return $theatres;
    }
}
class employees {
    public function getemployeesdata() {
        $adminProfileInstance = new adminprofile();
        $userDetails = $adminProfileInstance->getEmployeeDetails();
        return $userDetails;   
    }
}
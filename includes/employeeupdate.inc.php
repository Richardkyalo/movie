<?php

include "../classes/connect.php";
include "../classes/admins/addemployee.db.php";
include "../classes/admins/adminprofile.db.php";
include "../controller/add_employee_controller.php";
include "../controller/updateemployee_controller.php";
if(isset($_POST["submit"])){
    $role=stripslashes(htmlspecialchars($_POST["role"]));
    $firstname=stripslashes(htmlspecialchars($_POST["firstname"]));
    $email=stripslashes(htmlspecialchars($_POST["email"]));
   // $password=stripslashes(htmlspecialchars($_POST["password"]));
    $theatre=stripslashes(htmlspecialchars($_POST["theatre"]));
    $phone=stripslashes(htmlspecialchars($_POST["phone"]));

    
    $updateemployee= new Updateemployee_controller($role, $firstname, $email, $theatre, $phone);
    $updateemployee-> update_employee();
}
class theatres
{
    public function getAllTheatreDetails()
    {
        $allTheatredetails = new Add_employee();
        $theatres = $allTheatredetails->getAllTheatreDetails();
        return $theatres;
    }
}
class profile {
    public function getuserdata($email) {
        $adminProfileInstance = new adminprofile();
        $userDetails = $adminProfileInstance->getUserDetails($email);
        return $userDetails;   
    }
}
class employee {
    public function getAllEmployeeDetails($email) {
        $employeeProfileInstance = new Add_employee();
        $userDetails = $employeeProfileInstance->getUserDetails($email);
        return $userDetails;   
    }
}
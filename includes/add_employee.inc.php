<?php

include "../classes/connect.php";
include "../classes/admins/addemployee.db.php";
include "../controller/add_employee_controller.php";
if(isset($_POST["submit"])){
    $role=stripslashes(htmlspecialchars($_POST["role"]));
    $firstname=stripslashes(htmlspecialchars($_POST["firstname"]));
    $email=stripslashes(htmlspecialchars($_POST["email"]));
    $password=stripslashes(htmlspecialchars($_POST["password"]));
    $theatre=stripslashes(htmlspecialchars($_POST["theatre"]));
    $phone=stripslashes(htmlspecialchars($_POST["phone"]));

    
    $addemployee= new add_employee_controller($role, $firstname, $email, $password, $theatre, $phone);
    $addemployee-> add_employee();
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
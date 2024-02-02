<?php
include '../classes/connect.php';
include '../classes/admins/add_theatre.php';
include '../controller/add_theatre_controller.php';
if(isset($_POST["submit"])){
    $theatre_name=stripslashes(htmlspecialchars($_POST["theatre_name"]));
    $county=stripslashes(htmlspecialchars($_POST["county"]));
    $town=stripslashes(htmlspecialchars($_POST["town"]));
    $street=stripslashes(htmlspecialchars($_POST["street"]));
    $seats= stripslashes(htmlspecialchars($_POST["seats"]));
    $image=$_FILES['image']['name'];


    
    $add_theatre= new add_theatre_controller($theatre_name, $county, $town, $street, $seats, $image);
    $add_theatre->add_theatre();
}
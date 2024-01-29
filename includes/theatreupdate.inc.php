<?php
    include "../classes/connect.php";
    include "../classes/admins/add_theatre.php";
    include "../controller/update_theatre_controller.php";
if(isset($_POST["submit"])){
    $theatre_name=stripslashes(htmlspecialchars($_POST["theatre_name"]));
    $county=stripslashes(htmlspecialchars($_POST["county"]));
    $town=stripslashes(htmlspecialchars($_POST["town"]));
    $street=stripslashes(htmlspecialchars($_POST["street"]));
    $seats= stripslashes(htmlspecialchars($_POST["seats"]));
    $image=$_FILES['image']['name'];
    
    $update_theatre= new add_theatre_controller($theatre_name, $county, $town, $street, $seats, $image);
    $update_theatre->update_theatre();
}
class theatre_details {
    public function gettheatredata($theatre) {
        $theatreInstance = new Add_theatre();
        $theatreDetails = $theatreInstance->get_theatre($theatre);
        return $theatreDetails; 
    }
}
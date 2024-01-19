<?php
if (isset($_POST['submit'])) {
    $firstname = stripslashes(htmlspecialchars($_POST['firstname']));
    $secondname = stripslashes(htmlspecialchars($_POST['secondname']));
    $address = stripslashes(htmlspecialchars($_POST['address']));
    $town = stripslashes(htmlspecialchars($_POST['town']));
    $street = stripslashes(htmlspecialchars($_POST['street']));
    $theatre = stripslashes(htmlspecialchars($_POST['theatre']));
    $phone = stripslashes(htmlspecialchars($_POST['phone']));
    $email = stripslashes(htmlspecialchars($_POST['email']));

    include "../classes/connect.php";
    include "../classes/admins/adminprofile.db.php";
    include "../controller/adminprofile.controller.php";

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
}

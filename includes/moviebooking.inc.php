<?php

include '../classes/connect.php';
include '../classes/customers/bookmovie.php';
include '../controller/book_movie_controller.php';
if (isset($_POST['ticket_book'])) {
    $name = stripslashes(htmlspecialchars($_POST['name']));
    $phone = stripslashes(htmlspecialchars($_POST['phone']));
    $selectedSeats = implode(',', $_POST['selected_seats']);
    $theatre = stripslashes(htmlspecialchars($_POST['theatre']));



}
class userdata {
    public function getcustomersdata($user_id) {
        $customerInstance = new customer();
        $customerDetails = $customerInstance->getcustomerDetails($user_id);
        return $customerDetails;   
    }
}
class moviedata {
 public function getmoviedata($movie_id) {
    $movieInstance = new customer();
    $movieDetails = $movieInstance->getmovieDetails($movie_id);
    return $movieDetails;
 }
}
class theatredata {
    public function gettheatredata($theatrename) {
        $theatreInstance = new customer();
        $theatredetails = $theatreInstance->gettheatredetails($theatrename);
        return $theatredetails;
    }
}
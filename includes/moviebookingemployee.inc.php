<?php

include '../classes/connect.php';
include '../classes/customers/bookmovie.php';
include '../controller/employee_book_movie_controller.php';
if (isset($_POST['ticket_book'])) {
    $name = stripslashes(htmlspecialchars($_POST['name']));
    $phone = stripslashes(htmlspecialchars($_POST['phone']));
    $seats = implode(',', $_POST['selected_seats']);
    $theatre = stripslashes(htmlspecialchars($_POST['theatre']));
    $movie_id=stripslashes(htmlspecialchars($_POST['movie_id']));

$book=new employee_book_movie_controller($name, $seats, $theatre, $phone, $movie_id);
$bookmovie= $book->book_movie();

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
class seatavailability {
    public function selectedseats($movie_id){
        $seats = new customer();
        $seatsselected= $seats->selected_seats($movie_id);
        return $seatsselected;
    }
}
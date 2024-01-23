<?php
include '../classes/connect.php';
include '../classes/admins/add_movie.php';
include '../controller/add_movie_controller.php';
$selectedTheatres = [];
$selectedDates = [];
$selectedTimes = [];
if (isset($_POST['submit'])) {
    $movie_name = stripslashes(htmlspecialchars($_POST['movie_name']));
    $movie_description = stripslashes(htmlspecialchars($_POST['movie_description']));
    $hours = stripslashes(htmlspecialchars($_POST['hours']));
    $minutes = stripslashes(htmlspecialchars($_POST['minutes']));
    $charge = stripslashes(htmlspecialchars($_POST['charge']));
    $rating = stripslashes(htmlspecialchars($_POST['rating']));
    $actor = stripslashes(htmlspecialchars($_POST['actor']));
    $cover = $_FILES['image']['name'];

    $selectedTheatres = $_POST['theatres'];
    $selectedDates = $_POST['date'];
    $selectedTimes = $_POST['time'];
    $cover_size = $_FILES['image']['size'];

    $selectedDates1Formatted = date('Y-m-d', strtotime($selectedDates1));
$selectedTimes1Formatted = date('H:i:s', strtotime($selectedTimes1));


    $selectedTheatre1=$selectedTheatres[0];
    $selectedDates1= date('Y-m-d',strtotime($selectedDates[0]));
    $selectedTimes1= date('H:i:s', strtotime($selectedTimes[0]));
    $selectedTheatre2= $selectedTheatres[1];
    $selectedDates2= date('Y-m-d',strtotime($selectedDates[1]));
    $selectedTimes2=date('H:i:s', strtotime($selectedTimes[1]));
    $selectedtheatre3= $selectedTheatres[2];
    $selectedDates3=date('Y-m-d',strtotime($selectedDates[2]));
    $selectedTimes3= date('H:i:s', strtotime($selectedTimes[2]));


    $add_movie = new add_movie_controller(
        $movie_name,
        $movie_description,
        $hours,
        $minutes,
        $charge,
        $rating,
        $actor,
        $cover,
        $selectedTheatre1,
        $selectedDates1,
        $selectedTimes1,
        $selectedTheatre2,
        $selectedDates2,
        $selectedTimes2,
        $selectedtheatre3,
        $selectedDates3,
        $selectedTimes3
    );
    $add_movie->add_movie();
}
class theatres
{
    public function getAllTheatreDetails()
    {
        $allTheatredetails = new add_movie();
        $theatres = $allTheatredetails->getAllTheatreDetails();
        return $theatres;
    }
}

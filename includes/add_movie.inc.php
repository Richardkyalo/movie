<?php
include '../classes/connect.php';
include '../classes/admins/add_movie.php';
include '../controller/add_movie_controller.php';
if (isset($_POST['submit'])) {
    $movie_name = stripslashes(htmlspecialchars($_POST['movie_name']));
    $movie_description = stripslashes(htmlspecialchars($_POST['movie_description']));
    $hours = stripslashes(htmlspecialchars($_POST['hours']));
    $minutes = stripslashes(htmlspecialchars($_POST['minutes']));
    $charge = stripslashes(htmlspecialchars($_POST['charge']));
    $rating = stripslashes(htmlspecialchars($_POST['rating']));
    $actor = stripslashes(htmlspecialchars($_POST['actor']));
    $theatre=stripslashes(htmlspecialchars($_POST['theatre']));
    $date=stripslashes(htmlspecialchars($_POST['date']));
    $time=stripslashes(htmlspecialchars($_POST['time']));
    $cover = $_FILES['image']['name'];

    // $selectedTheatres = $_POST['theatres'];
    // $selectedDates = $_POST['date'];
    // $selectedTimes = $_POST['time'];
    $cover_size = $_FILES['image']['size'];


    $add_movie = new add_movie_controller(
        $movie_name,
        $movie_description,
        $hours,
        $minutes,
        $charge,
        $rating,
        $actor,
        $cover,
        $theatre,
        $date,
        $time
    );
    $add_movie->add_movie();
}
class profile {
    public function getuserdata($email) {
        $adminProfileInstance = new add_movie();
        $userDetails = $adminProfileInstance->getUserDetails($email);
        return $userDetails;   
    }
}
class movies {
    public function get_movies() {
        $movie = new add_movie();
        $movies = $movie->get_all_movies();
        return $movies;
    }
}
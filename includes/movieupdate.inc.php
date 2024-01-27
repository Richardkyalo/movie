<?php
include '../classes/connect.php';
include '../classes/admins/add_movie.php';
include '../controller/updatemovie_controller.php';
if(isset($_POST['submit'])){
    $movie=stripslashes(htmlspecialchars($_POST['movie_name']));
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
    $cover_size = $_FILES['image']['size'];


    $add_movie = new updatemovie_controller(
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
        $time,
        $movie
    );
    $add_movie->updatemovie();
}
class movie_detail {
    public function getmoviedata($movie) {
        $movieInstance = new add_movie();
        $movieDetails = $movieInstance->get_movie($movie);
        return $movieDetails; 
    }
}
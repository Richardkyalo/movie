<?php
if(isset($_POST['submit'])){
    $movie_name= stripslashes(htmlspecialchars($_POST['movie_name']));
    $movie_description= stripslashes(htmlspecialchars($_POST['movie_description']));
    $movie_url= stripslashes(htmlspecialchars($_POST['movie_url']));
    $theatre_name=stripslashes(htmlspecialchars($_POST['theater_name']));
    $hours=stripslashes(htmlspecialchars($_POST['hours']));
    $minutes=stripslashes(htmlspecialchars($_POST['minutes']) );
    $charge=stripslashes(htmlspecialchars($_POST['charge']) );
    $rating=stripslashes(htmlspecialchars($_POST['rating']) );
    $actor=stripslashes(htmlspecialchars($_POST['actor']) );
    $cover=$_FILES['image']['name'];
    $cover_size=$_FILES['image']['size'];

    include '../classes/connect.php';
    include '../classes/admins/add_movie.php';
    include '../controller/add_movie_controller.php';

    $add_movie= new add_movie_controller($movie_name, $movie_description, $movie_url, $theatre_name, $hours, $minutes, $charge, $rating, $actor, $cover);
    $add_movie->add_movie();
    
}
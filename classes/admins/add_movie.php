<?php
class add_movie extends database {
    protected function addMovie($movie_name, $movie_description, $movie_url, $theatre_name, $hours, $minutes, $charge, $rating, $actor, $cover){
        $stmt=$this->connect()->prepare("INSERT INTO movies(movie, movie_description, movie_url, theatres, Length_hours, Length_minutes, charge, rating, actor, cover)
        values(?,?,?,?,?,?,?,?,?,?)");
        if($stmt->execute(array($movie_name, $movie_description, $movie_url, $theatre_name,$hours, $minutes,$charge, $rating, $actor, $cover))){
            $stmt=null;
            header("Location:..views/adminmovies.php");
            exit();
        }else{
            $stmt=null;
            header("Location:../views/add_movie.php? error= SERVER ERROR");
        }
    }
}
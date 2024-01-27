<?php
class Updatemovie_controller extends add_movie
{
    private $movie;
    private $movie_name;
    private $hours;
    private $minutes;
    private $charge;
    private $rating;
    private $actor;
    private $movie_description;
    private $cover;
    private $theatre;
    private $date;
    private $time;
    private $cover_size;
    private $path = "../views/updatemovie.php";

    public function __construct(
        $movie,
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
        $movie_name,
    ) {
        $this->movie = $movie;
        $this->movie_description = $movie_description;
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->charge = $charge;
        $this->rating = $rating;
        $this->actor = $actor;
        $this->cover = $cover;
        $this->theatre= $theatre;
        $this->date = $date;
        $this->time = $time;
        $this->movie_name = $movie_name;
    }

    public function rating()
    {
        $response = "";
        if ($this->rating > 10 && $this->rating < 0) {
            $response = false;
        } else {
            $response = true;
        }
        return $response;
    }
    public function cover_size()
    {
        $response = "";
        if ($this->cover_size > 6000000) {
            $response = false;
        } else {
            $response = true;
        }
        return $response;
    }
    public function cover_type()
    {
        $response = "";
        $cover_extension = pathinfo($this->cover, PATHINFO_EXTENSION);
        if ($cover_extension == "jpg" || $cover_extension == "png" || $cover_extension == "jpeg") {
            $response = true;
        } else {
            $response = false;
        }
        return $response;
    }
    public function updatemovie()
    {
        if ($this->rating == false) {
            header("Location:" . $this->path . "? error=wrong rating");
            exit();
        }
        if ($this->cover_size() == false) {
            header("Location:" . $this->path . "? error=large file");
            exit();
        }
        // if ($this->cover_type() == false) {
        //     header("Location:" . $this->path . "? error= Wrong type of cover");
        //     exit();
        // } 
        else {
            $this->update_movie(
                $this->movie_name,
                $this->movie_description,
                $this->hours,
                $this->minutes,
                $this->charge,
                $this->rating,
                $this->actor,
                $this->cover,
                $this->theatre,
                $this->date,
                $this->time,
                $this->movie
            );
            header("Location: ../views/adminmovies.php ? error=");
            exit();
        }
    }
}

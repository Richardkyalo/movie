<?php
class add_movie_controller extends add_movie
{
    private $movie_name;
    private $selectedTheatre1;
    private $selectedTheatre2;
    private $selectedTheatre3;
    private $selectedDates1;
    private $selectedDates2;
    private $selectedDates3;
    private $selectedTimes1;
    private $selectedTimes2;
    private $selectedTimes3;
    private $hours;
    private $minutes;
    private $charge;
    private $rating;
    private $actor;
    private $movie_description;
    private $cover;
    private $cover_size;
    private $path = "../views/add_movie.php";

    public function __construct(
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
        $selectedTimes3,
    ) {
        $this->movie_name = $movie_name;
        $this->movie_description = $movie_description;
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->charge = $charge;
        $this->rating = $rating;
        $this->actor = $actor;
        $this->cover = $cover;
        $this->selectedTheatre1 = $selectedTheatre1;
        $this->selectedDates1 = $selectedDates1;
        $this->selectedTimes1 = $selectedTimes1;
        $this->selectedTheatre2 = $selectedTheatre2;
        $this->selectedDates2 = $selectedDates2;
        $this->selectedTimes2 = $selectedTimes2;
        $this->selectedTheatre3 = $selectedtheatre3;
        $this->selectedDates3 = $selectedDates3;
        $this->selectedTimes3 = $selectedTimes3;

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
    public function add_movie()
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
            $this->addMovie(
                $this->movie_name,
                $this->movie_description,
                $this->hours,
                $this->minutes,
                $this->charge,
                $this->rating,
                $this->actor,
                $this->cover,
                $this->selectedTheatre1,
                $this->selectedDates1,
                $this->selectedTimes1,
                $this->selectedTheatre2,
                $this->selectedDates2,
                $this->selectedTimes2,
                $this->selectedTheatre3,
                $this->selectedDates3,
                $this->selectedTimes3
            );
            header("Location: ../views/adminmovies.php");
            exit();
        }
    }
}

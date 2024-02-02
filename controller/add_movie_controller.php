<?php
class add_movie_controller extends add_movie
{
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
        $theatre,
        $date,
        $time
    ) {
        $this->movie_name = $movie_name;
        $this->movie_description = $movie_description;
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->charge = $charge;
        $this->rating = $rating;
        $this->actor = $actor;
        $this->theatre= $theatre;
        $this->date = $date;
        $this->time = $time;
        $this->cover = $cover;
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
    private function uploadFile()
    {
        $tempFile = $_FILES['image']['tmp_name'];
        $image_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $newFileName = bin2hex(random_bytes(5)) . '.' . $image_extension;
        $targetFile = "../views/images/" . $newFileName;

        if (move_uploaded_file($tempFile, $targetFile)) {
            return $newFileName;
        } else {
            return false;
        }
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
            $uploadedFile = $this->uploadFile();
            if($uploadedFile){
                if($this->addMovie(
                    $this->movie_name,
                    $this->movie_description,
                    $this->hours,
                    $this->minutes,
                    $this->charge,
                    $this->rating,
                    $this->actor,
                    $uploadedFile,
                    $this->theatre,
                    $this->date,
                    $this->time
                )){
                    header("Location: ../views/adminmovies.php ?");
                    exit();
                }else{           
                    header("Location: " . $this->path . "?error=Failed to add theatre");
                    exit();
                }
            }else{
                header("Location: " . $this->path . "?error=Failed to upload file");
                exit();
            }
            

        }
    }
}

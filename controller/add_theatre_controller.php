<?php
class Add_theatre_controller extends add_theatre
{
    private $theatre_name;
    private $county;
    private $town;
    private $street;
    private $seats;
    private $image;
    private $path = "./addtheatres.php";

    public function __construct($theatre_name, $county, $town, $street, $seats, $image)
    {
        $this->theatre_name = $theatre_name;
        $this->county = $county;
        $this->town = $town;
        $this->street = $street;
        $this->seats = $seats;
        $this->image = $image;
    }

    private function emptyChecker()
    {
        return !empty($this->theatre_name) && !empty($this->county) && !empty($this->town) && !empty($this->street) && !empty($this->seats) && !empty($this->image);
    }

    private function theatreExists()
    {
        return !$this->checkTheatre($this->theatre_name);
    }

    private function image_size($input)
    {
        return $input <= 6000000; 
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

    public function add_theatre()
    {
        if (!$this->emptyChecker()) {
            header("Location: " . $this->path . "?error=All fields are required");
            exit();
        }

        if (!$this->image_size($this->image)) {
            header("Location: " . $this->path . "?error=Wrong file size");
            exit();
        }

        if (!$this->theatreExists()) {
            header("Location: " . $this->path . "?error=Theatre already exists");
            exit();
        }

        $uploadedFile = $this->uploadFile();

        if ($uploadedFile !== false && $this->addtheatre($this->theatre_name, $this->county, $this->town, $this->street, $this->seats, $uploadedFile)) {
            header("Location: ../views/admintheatres.php");
            exit();
        } else {
            header("Location: ./addtheatres.php");
            exit();
        }
    }
}

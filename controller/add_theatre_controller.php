<?php
class add_theatre_controller extends add_theatre
{
    private $theatre_name;
    private $county;
    private $town;
    private $street;
    private $seats;
    private $image;
    private $path = "./addtheatres.php";
    public $uploadedFileNames = [];
    private $allowedExtensions = ['jpeg', 'jpg', 'png'];

    public function __construct($theatre_name, $county, $town, $street, $seats, $image)
    {
        $this->theatre_name = $theatre_name;
        $this->county = $county;
        $this->town = $town;
        $this->street = $street;
        $this->seats = $seats;
        $this->image = $image;
    }
    private function emptyChecker(){
        $response= "";
        if(empty($this->theatre_name)||empty($this->county)||empty($this->town)||empty($this->street)||empty($this->seats)||empty($this->image)){
            $response=false;
        }else{
            $response= true;
        }
        return $response;
    }
    private function theatreExists()
    {
        $response = "";
        if ($this->checkTheatre($this->theatre_name)) {
            $response = false;
        } else {
            $response = true;
        }
        return $response;
    }
    private function image_size($input)
    {
        $response = "";
        if ($input > 6000000) {
            $response = false;
        } else {
            $response = true;
        }
        return $response;
    }
    // private function checkimages()
    // {
    //     $response="";
    //     $maxImages = 4;
    //     $uploadedImagesCount = count($_FILES['images']['name']);
    //     if ($uploadedImagesCount==$maxImages) {
    //         $response=true;
    //     } else {
    //         $response=false;
    //     }
    //     return $response;
    // }
    private function getfiles(){
        $uploadedFileNames = [];
        for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
            $tempFile = $_FILES['images']['tmp_name'][$i];
            $image_extension = ".jpg";
            $newFileName = bin2hex(random_bytes(5)) . $image_extension;
            $targetFile = "../views/images/" . $newFileName;
            $uploadedFileNames[] = $newFileName;
            // if (move_uploaded_file($tempFile, $targetFile)) {
            //     $response=true;
            // } else {
            //    $response=false;
            // }
        }
        return $uploadedFileNames;
    }
    private function uploadfiles(){
        $files=$this->getfiles();
        foreach ($files as $file) {
            return $file;
        }
    }
    public function add_theatre()
    {
        if($this->emptyChecker()== true){
            header("Location" . $this->path . "? error= All fields are required");
        }
        if ($this->image_size($this->image) == false) {
            header("Location" . $this->path . "? error= Wrong file size");
        }
        // if ($this->checkimages() == false) {
        //     header("Location:" . $this->path . "? error= Upload 4 images");
        // }
        if ($this->theatreExists() == false) {
            header("Location:" . $this->path . "? error= Theatre already Exists");
        } else {
            if (
                $this->addtheatre($this->theatre_name, $this->county, $this->town, $this->street, $this->seats, $this->image) &&
                $this->uploadFiles()
            ) {
                header("Location: ../views/admintheatres.php");
                exit();
            } else {
                header("Location:./addtheatres.php");
            }
        }
    }
}

<?php

class Imageprofile_controller extends customer{
    private $image;
    private $user_id;
    private $cover_size;
    public function __construct($image, $user_id)
    {
        $this->image = $image;
        $this->user_id = $user_id;
    }

    private function cover_size()
    {
        $response = "";
        if ($this->cover_size > 6000000) {
            $response = false;
        } else {
            $response = true;
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
    public function updatecover(){
        $uploadedFile = $this->uploadFile();
        if ($uploadedFile) {
            $this->updateImage($uploadedFile, $this->user_id);
        }else{
            header("Location: ../views/userprofile.php?error=Failed to upload file");
            exit();
        }
    }
}
<?php
class profile_controller extends adminprofile {
   
    private $email;
    private $image;
    private $image_size;
    private $path = "./adminprofile.php";
    private $name;

    public function __construct(
     $image,
     $email,
     $image_size
     ){
      
       $this->email=$email;
       $this->image = $image;
       $this->image_size= $image_size;
    }
   
 
    private function image_Size($input)
    {
        $response = "";
        if ($input > 6000000) {
            $response = false;
        } else {
            $response = true;
        }
        return $response;
    }
    private function uploadFile()
    {
        $tempFile = $_FILES['images']['tmp_name'];
        $image_extension = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
        $newFileName = bin2hex(random_bytes(5)) . '.' . $image_extension;
        $targetFile = "../views/images/" . $newFileName;

        if (move_uploaded_file($tempFile, $targetFile)) {
            $this->name= $newFileName;
            return true;
        } else {
            return "false";
        }
    }

    public function updateUser(){
        if (!$this->image_Size($this->image_size)) {
            header("Location:./adminprofile.php? error= invalid image");
            exit();
        }

        if ($this->uploadFile() && $this->name) {
            if ($this->updateUserProfile($this->name , $this->email)) {
                header("Location:./adminprofile.php? error=".$this->name);
                exit();
            } else {
                header("Location: " . $this->path . "?error=Failed to update profile");
                exit();
            }
        } else {
            // header("Location: " . $this->path . "?error=Failed to upload file");
            // exit();
        } 
    }
}
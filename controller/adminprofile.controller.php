<?php
class Adminprofile_controller extends adminprofile {
    private $firstname;
    private $secondname;
    private $address;
    private $town;
    private $street;
    private $theatre;
    private $phone;
    private $email;
    

    public function __construct(
    $firstname,
     $secondname, 
     $address, 
     $town, 
     $street,
     $theatre,
     $phone,
     $email,
     ){
       $this->firstname=$firstname;
       $this->secondname=$secondname;
       $this->address=$address;
       $this->town=$town;
       $this->street=$street;
       $this->theatre=$theatre;
       $this->phone=$phone;
       $this->email=$email;
    }
    public function emailFilter()
    {
        $response = "";
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
           $response=false;
        } else {
            $response = true;
        }
        return $response;
    }

    private function filterPhone(){
        $response="";
        if (substr($this->phone, 0, 1) === '0' && strlen($this->phone) === 10) {
            $response=true;
        } else {
            $response=false;
        }
        return $response;
    }
    private function emptyChecker(){
        $response= "";
        if(empty($this->firstname)||empty( $this->secondname)||empty( $this->address)||empty($this->town)
        ||empty($this->street)||empty($this->theatre)||empty($this->phone)|| empty($this->email)){
            $response=false;
        }else{
            $response= true;
        }
        return $response;

    }
    private function image_size($input)
    {
        $response = "";
        if ($input > 56) {
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

    public function updateUser(){
        if($this->filterPhone()==false){
            header("Location:./adminprofile.php? error=invalid Phone number");
            exit();
        }
        if($this->emptyChecker()==false){
            header("Location:./adminprofile.php? error= all fields are required");
            exit();
        }
        if($this->emailFilter()==false){
            header("Location:./adminprofile.php? error= invalid email");
            exit();
        }else{
            $this->updateUserDetails($this->firstname, $this->secondname, $this->address,$this->town,
        $this->street, $this->theatre, $this->phone, $this->email);
        header("Location:./adminprofile.php? error= successfuly updated your details.");
        }
 
        $uploadedFile = $this->uploadFile();
    }
}
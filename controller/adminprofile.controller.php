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

    public function __construct($firstname, $secondname, $address, $town, $street, $theatre, $phone, $email){
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
    

    public function updateUser(){
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
 
        
    }
}
<?php 
class customerprofile_controller extends customer {
    private $user_id;
    private $firstname;
    private $secondname;
    private $email;
    private $street;
    private $town;
    private $phone;
    private $address;

    public function __construct($firstname, $secondname, $address, $town, $street,$phone, $email, $user_id) {
        
        $this->firstname= $firstname;
        $this->secondname= $secondname;
        $this->address= $address;
        $this->town= $town;
        $this->street= $street;
        $this->phone= $phone;
        $this->email= $email;
        $this->user_id=$user_id;

    }
    private function emptyChecker(){
        $response= "";
        if(empty($this->firstname)||empty( $this->secondname)||empty( $this->address)||empty($this->town)
        ||empty($this->street)||empty($this->phone)|| empty($this->email)){
            $response=false;
        }else{
            $response= true;
        }
        return $response;

    }
    public function updateUser(){
        if($this->emptyChecker()==false){
            header("Location:./userprofile.php? error= all fields are required");
            exit();
        }else{
            $this->updateUserDetails($this->firstname, $this->secondname, $this->address,$this->town,
            $this->street,$this->phone, $this->email, $this->user_id);
        }
    }

}
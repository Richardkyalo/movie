<?php
class signup_controller extends signup{
    private $email;
    private $password ;
    private $confirm_password;

    public function __construct($email, $password, $confirm_password){
        $this->email = $email;
        $this->password = $password;
        $this->confirm_password =$confirm_password;
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
        if(empty($this->email)||empty($this->password)||empty($this->confirm_password)){
            $response=false;
        }else{
            $response= true;
        }
        return $response;

    }
    private function passwordChecker(){
        $response="";
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->password)){
            $response=false;
        }else{
            $response=true;
        }
        return $response;
    }
    private function confirmPassword(){
        $response="";
        if($this->password!==$this->confirm_password){
            $response=false;
        }else {
            $response=true;
        }
        return $response;
    }
    
    private function UserExists(){
        $response="";
        if($this->checkUser($this->email)){
            $response= false;
        }else{
            $response= true;
        }
        return $response;
    }
    public function signupUser(){
        if($this->emptyChecker()==false){
            header("Location:./signup.php? error= all fields are required");
            exit();
        }
        if($this->emailFilter()==false){
            header("Location:./signup.php? error= invalid email");
            exit();
        }
       if($this->passwordChecker()==false){
            header("Location:./signup.php? error= invalid password");
            exit();
        }if($this->confirmPassword()==false){
            header("Location:./signup.php? error= Password mismatch");
            exit();
        }if($this->UserExists()==false){
            header("Location:./signup.php? error= user exists");
            
        }else{
            $this->createUser($this->email, $this->password);
        }
 
        
    }
}
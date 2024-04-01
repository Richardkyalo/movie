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
    private  function passwordLength(){
        $length = strlen($this->password);
        $response="";
        if ($length < 8 || $length > 20) {
            $response=false;
        }else{
            $response=true;
        }
        return $response;
    }
    private function passwordStrength(){
        $uppercase = preg_match('/[A-Z]/', $this->password);
        $lowercase = preg_match('/[a-z]/', $this->password);
        $number = preg_match('/[0-9]/', $this->password);
        $specialChars = preg_match('/[^\w\s]/', $this->password);
        $response="";
        if (!$uppercase || !$lowercase || !$number || !$specialChars) {
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
        if($this->passwordLength()==false){
            header("Location:./signup.php? error=Password must be atleast 8 characters long");
            exit();
        }
        if($this->passwordStrength()==false){
            header("Location:./signup.php? error=Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
            exit();
        }
        if($this->emailFilter()==false){
            header("Location:./signup.php? error= invalid email");
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
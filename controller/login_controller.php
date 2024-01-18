<?php
class login_controller extends login
{
    private $email;
    private $password;
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password =$password;
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
        if(empty($this->email)||empty($this->password)){
            $response=false;
        }else{
            $response= true;
        }
        return $response;

    }
    public function Isloged(){
        if($this->emptyChecker()==false){
            header("Location:./login.php? error= all fields are required");
            exit();
        }
        if($this->emailFilter()==false){
            header("Location: ./login.php? error= invalid email");
        }
        $this->loginUser($this->email,$this->password);
    }
}

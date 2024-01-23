<?php 
class signup extends database{
    protected function checkUser($email){
        $stmt=$this->connect()->prepare("SELECT * FROM users WHERE email=?;");
        $response="";
        if($stmt->execute(array($email))){
            if($stmt->rowCount()>0){
                $response=true;
            }else{
                $response=false;
        }
            $stmt =null;
        }       
        return $response;
    }
    protected function createUser($email, $password){
        $stmt=$this->connect()->prepare("INSERT INTO users(email,passwords, roles) values(?,?,?);");
        $hasshed_password= password_hash($password, PASSWORD_DEFAULT);
        $roles="customer";
        if($stmt->execute(array($email,$hasshed_password,$roles))){
            $stmt=null;
            header("Location: ../views/login.php");
            exit();
        }
        else{
            $stmt=null;
            header("Location:./signup.php? error=Server Error");

        }
    }
}
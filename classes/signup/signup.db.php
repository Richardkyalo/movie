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
        $stmt=$this->connect()->prepare("INSERT INTO users(email,passwords, roles, user_id) values(?,?,?,?);");
        $hasshed_password= password_hash($password, PASSWORD_DEFAULT);
        $roles="admin";

        function generateRandomString($length = 6)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
        }

        $user_id = generateRandomString();
        if($stmt->execute(array($email,$hasshed_password,$roles,$user_id))){
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
<?php
class Add_employee extends database{
    protected function checkEmployee($email){
        $stmt=$this->connect()->prepare("SELECT * FROM users WHERE email=?;");
        $response="";
        if($stmt->execute(array($email))){
            if($stmt->rowCount()>0){
                // $data = $stmt->fetch(PDO::FETCH_ASSOC);
                // echo $data["email"];
                $response=true;
            }else{
                $response=false;
        }
            $stmt =null;
        }       
        return $response;
    }
    protected function createEmployee($role, $firstname, $email, $password, $theatre, $phone){
        $stmt=$this->connect()->prepare("INSERT INTO users(roles, firstname, email, passwords, theatre, phone) values(?,?,?,?,?,?)");
        $hasshed_password= password_hash($password, PASSWORD_DEFAULT);
        if($stmt->execute(array($role,$firstname,$email,$hasshed_password,$theatre,$phone))){
            $stmt=null;
            header("Location: ../views/allusers.php");
            exit();
        }
        else{
            $stmt=null;
            header("Location:./addemployee.php? error=Server Error");
        }

    }
    public function getAllTheatreDetails()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM theatres");
        $stmt->execute();
        $allTheatreDetails = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $stmt = null;
        return $allTheatreDetails;
    }
}
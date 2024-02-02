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
        $stmt=$this->connect()->prepare("INSERT INTO users(roles, firstname, email, passwords, theatre, phone, user_id) values(?,?,?,?,?,?,?)");
        $hasshed_password= password_hash($password, PASSWORD_DEFAULT);

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
        if($stmt->execute(array($role,$firstname,$email,$hasshed_password,$theatre,$phone,$user_id))){
            $stmt=null;
            header("Location: ../views/employees.php");
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
    public function getUserDetails($email){
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute(array($email));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        return $user;
    }
    public function updateEmployee($role, $firstname, $email, $theatre, $phone) {
        // Assuming 'id' is the primary key to identify the employee you want to update
        $stmt = $this->connect()->prepare("UPDATE users SET roles=?, firstname=?, email=?,
        theatre=?, phone=? WHERE email=?");    
        if ($stmt->execute(array($role, $firstname, $email, $theatre, $phone, $email))) {
            $stmt = null;
            header("Location: ../views/employees.php");
            exit();
        } else {
            $stmt = null;
            header("Location: ./updateemployee.php? error=Server Error");
            exit();
        }
    }
    public function deleteeemployee($employee){
        $stmt = $this->connect()->prepare("DELETE FROM users WHERE email=?");
        $stmt->execute(array($employee));
        $stmt = null;
        header("Location: ../views/employees.php");
        exit();
    }
    
}
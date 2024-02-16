<?php
session_start();
class login extends database
{
    protected function loginUser($email, $password)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email=?");
        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: ../views/login.php? error= check your cridentials");
            exit();
        }
        if ($stmt->rowcount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $roles = $data["roles"];
            $hashed_password = $data['passwords'];
            if (password_verify($password, $hashed_password)) {
                // Set session variables
                $_SESSION['email'] = $data["email"];
                $_SESSION["roles"] = $data["roles"];
                $_SESSION['user_id']=$data["user_id"];
                $_SESSION["login"] = "OK";

                if ($roles === "admin") {
                    header("Location:../views/adminprofile.php");
                } 
                elseif ($roles === "customer") {
                    header("location:../views/home.php");
                } 
                elseif ($roles = "employees") {
                    header("location:../views/employeehome.php");
                }
            } else {
                header("Location:../views/login.php? error=invalid details.");
            }
        } else {
            header("Location:../views/login.php? error= Login failed");
        }
    }
}

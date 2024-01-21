<?php
class Add_employee_controller extends add_employee
{
    private $role;
    private $firstname;
    private $email;
    private $password;
    private $theatre;
    private $phone;
    private $path = "./addemployee.php";
    private $path2= "./allusers.php";

    public function __construct($role, $firstname, $email, $password, $theatre, $phone)
    {
        $this->role = $role;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
        $this->theatre = $theatre;
        $this->phone = $phone;
    }

    private function emptyChecker()
    {
        $response= "";
        if(empty($this->firstname)||empty($this->email) ||empty($this->password)||
        empty($this->theatre)||empty($this->phone)
        ){
            $response=false;
        }else{
            $response= true;
        }
        return $response;

    }

    private function employeeExists()
    {
        return !$this->checkEmployee($this->email);
    }

    public function add_employee()
    {
        if ($this->emptyChecker()==false) {
            header("Location: " . $this->path . "?error=All fields are required");
            exit();
        }

        if (!$this->employeeExists()) {
            header("Location: " . $this->path . "?error=Employee already exists");
            exit();
        }else {
            $this->createEmployee($this->role, $this->firstname, $this->email, $this->password, $this->theatre, $this->phone);
            header("Location". $this->path2 . "Successfully added Employee");
            exit();
        }
    }
}

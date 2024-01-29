<?php
class Updateemployee_controller extends add_employee
{
    private $role;
    private $firstname;
    private $email;
  //  private $password;
    private $theatre;
    private $phone;
    private $path = "./updateemployee.php";
    private $path2= "./employees.php";

    public function __construct($role, $firstname, $email, $theatre, $phone)
    {
        $this->role = $role;
        $this->firstname = $firstname;
        $this->email = $email;
        //$this->password = $password;
        $this->theatre = $theatre;
        $this->phone = $phone;
    }

    private function emptyChecker()
    {
        $response= "";
        if(empty($this->firstname)||empty($this->email) ||
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

    public function update_employee()
    {
        if ($this->emptyChecker()==false) {
            header("Location: " . $this->path . "?error=All fields are required");
            exit();
        }

        // if (!$this->employeeExists()) {
        //     header("Location: " . $this->path . "?error=Employee already exists");
        //     exit();
        // }
        else {
            $this->UpdateEmployee($this->role, $this->firstname, $this->email, $this->theatre, $this->phone);
            exit();
        }
    }
}

<?php
// class Add_employee_controller extends add_employee
// {
//     private $name;
//     private $seats;
//     private $theatre;
//     private $phone;
//     private $path = "./addemployee.php";
//     private $path2= "./employees.php";

//     public function __construct($name, $seats, $theatre, $phone)
//     {
//         $this->role = $name;
//         $this->firstname = $seats;
//         $this->theatre = $theatre;
//         $this->phone = $phone;
//     }

//     private function emptyChecker()
//     {
//         $response= "";
//         if(empty($this->firstname)||empty($this->email) ||empty($this->password)||
//         empty($this->theatre)||empty($this->phone)
//         ){
//             $response=false;
//         }else{
//             $response= true;
//         }
//         return $response;

//     }

//     private function employeeExists()
//     {
//         return !$this->checkEmployee($this->email);
//     }

//     public function add_employee()
//     {
//         if ($this->emptyChecker()==false) {
//             header("Location: " . $this->path . "?error=All fields are required");
//             exit();
//         }

//         if (!$this->employeeExists()) {
//             header("Location: " . $this->path . "?error=Employee already exists");
//             exit();
//         }else {
//             $this->createEmployee($this->role, $this->firstname, $this->email, $this->password, $this->theatre, $this->phone);
//             header("Location". $this->path2 . "Successfully added Employee");
//             exit();
//         }
//     }
// }

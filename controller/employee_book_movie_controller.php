<?php
class employee_book_movie_controller extends customer
{
    private $name;
    private $seats;
    private $theatre;
    private $phone;
    private $movie_id;
    private $path = "./home.php";
    private $path2= "./home.php";

    public function __construct($name, $seats, $theatre, $phone, $movie_id)
    {
        $this->name = $name;
        $this->seats = $seats;
        $this->theatre = $theatre;
        $this->phone = $phone;
        $this->movie_id = $movie_id;
    }

    private function emptyChecker()
    {
        $response= "";
        if(empty($this->name)||empty($this->theatre) ||empty($this->seats)||empty($this->phone)||empty($this->movie_id)
        ){
            $response=false;
        }else{
            $response= true;
        }
        return $response;

    }


    public function book_movie()
    {
        if ($this->emptyChecker()==false) {
            header("Location: " . $this->path . "?error=All fields are required");
            exit();
        }else {
            $this->book_a_movie_for_customer($this->name, $this->seats, $this->theatre, $this->phone, $this->movie_id);
           
            exit();
        }
    }
}

<?php 
class add_movie_controller extends add_movie{
    private $movie_name;
    private $movie_description;
    private $movie_url; 
    private $theatre_name;
    private $hours;
    private $minutes;   
    private $charge;
    private $rating;
    private $actor;
    private $cover;
    private $cover_size;
    private $cover_type;
    private $path="../views/add_movie.php";

    public function __construct($movie_name, $movie_description, $movie_url, $theatre_name, $hours, $minutes, $charge, $rating, $actor, $cover) {
        $this->movie_name =$movie_name;
        $this->movie_description = $movie_description;
        $this->movie_url= $movie_url;
        $this->theatre_name=$theatre_name;
        $this->hours=$hours;  
        $this->minutes=$minutes;
        $this->charge=$charge;
        $this->rating=$rating;
        $this->actor= $actor;
        $this->cover= $cover;

    }

    public function rating() {
        $response="";
        if($this->rating>10 && $this->rating<0){
            $response= false;
        }
        else{
            $response= true;
        }
        return $response;
    }
    public function cover_size(){
        $response= "";
        if($this->cover_size> 6000000){
            $response=false;
        }
        else{
            $response= true;
        }
        return $response;
    }
    public function cover_type(){
        $response= "";
        $cover_extension= pathinfo($this->cover, PATHINFO_EXTENSION);
        if($cover_extension=="jpg" || $cover_extension== "png" || $cover_extension== "jpeg"){
            $response= true;
    }else{
        $response= false;
    }
    return $response;
}
public function add_movie(){
    if($this->rating==false){
        header("Location".$this->path."? error=wrong rating");
        exit();
    }if($this->cover_size==false){
        header("Location".$this->path."? error=large file");
        exit();
    }if($this->cover_type==false){
        header("Location".$this->path."? error= Wrong type of cover");
        exit();
    }else{
        $this->addMovie($this->movie_name, $this->movie_description, $this->movie_url, $this->theatre_name, $this->hours, $this->minutes, $this->charge, $this->rating, $this->actor, $this->cover);
    }
}

}
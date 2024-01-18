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

    public function __construct($movie_name, $movie_description, $movie_url, $theatre_name, $hours, $minutes, $charge, $rating, $actor, $path) {
        $this->movie_name =$movie_name;
        $this->movie_description = $movie_description;
        $this->movie_url= $movie_url, $this->path);
        $this->theatre_name= $helper->emptyInputs($theatre_name, $this->path);
        $this->hours= $helper->emptyInputs($hours, $this->path);  
        $this->minutes= $helper->emptyInputs($minutes, $this->path);
        $this->charge= $helper->emptyInputs($charge, $this->path);
        $this->rating= $helper->emptyInputs($rating, $this->path);
        $this->actor= $helper->emptyInputs($actor, $this->path);

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
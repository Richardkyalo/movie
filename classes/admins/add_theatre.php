<?php
class Add_theatre extends database{
    protected function checkTheatre($theatre_name){
        $stmt=$this->connect()->prepare("SELECT * FROM theatres WHERE theatre_name=?;");
        $response="";
        if($stmt->execute(array($theatre_name))){
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
    protected function addtheatre($theatre_name, $county, $town, $street, $seats, $image){
        $stmt=$this->connect()->prepare("INSERT INTO theatres(theatre_name, county, town, streat, seats, display) values(?,?,?,?,?,?)");
        if($stmt->execute(array($theatre_name,$county,$town,$street,$seats,$image))){
            $stmt=null;
            // header("Location: ../views/admintheatres.php");
            // exit();
            return true;
        }
        else{
            $stmt=null;
            return false;
        }

    }
    public function get_theatre($theatre) {
        $stmt = $this->connect()->prepare("SELECT * FROM theatres WHERE theatre_name=?");
        $stmt->execute([$theatre]);
        $theatreDetails = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        return $theatreDetails;
    }
    protected function updatetheatre($theatre_name, $county, $town, $street, $seats, $image){
        $stmt = $this->connect()->prepare("UPDATE movies SET theatre_name = ?, county = ?,
        town = ?, streat = ?, seats = ?, dispaly= ? WHERE theatre_name = ?");
        try{
            $result = $stmt->execute([$theatre_name, $county, $town, $street, $seats, $image]);
            $stmt = null;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    public function deletetheatre($theatre) {
        $stmt = $this->connect()->prepare("DELETE FROM theatres WHERE theatre_name = ?");
        try{
            if($stmt->execute([$theatre])) {
            $stmt = null;
            header("Location: ../views/admintheatres.php");
            }
        }catch(PDOException $e) {
            echo "Error". $e->getMessage();
        }
}
    
}
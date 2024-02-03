<?php 
class customer extends database {
    public function getcustomerDetails($user_id){
        try{
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE user_id=?');
            $stmt->execute([$user_id]);
            $allCustomerDetails = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            return $allCustomerDetails;
        } catch(PDOException $e) {
            error_log('PDOException'. $e->getMessage());
            throw $e;
        }
    }
    public function getmovieDetails($movie_id) {
        try{
            $stmt = $this->connect()->prepare('SELECT * FROM movies WHERE movie_id=?');
            $stmt->execute([$movie_id]);
            $allMovieDetails = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            return $allMovieDetails;
        } catch(PDOException $e) {
            error_log('PDOException'. $e->getMessage());
            throw $e;
        }
    }
    public function gettheatredetails($theatrename) {
        try{
            $stmt = $this->connect()->prepare('SELECT * FROM theatres WHERE theatre_name=?');
            $stmt->execute([$theatrename]);
            $allMovies = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            return $allMovies;
        } catch(PDOException $e) {
            error_log('PDOException'. $e->getMessage());
            throw $e;
        }
    }
}
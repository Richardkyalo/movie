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
    public function book_a_movie($name, $seats, $theatre, $phone, $movie_id) {
        try {
            $stmt = $this->connect()->prepare("INSERT INTO bookings(name, seats, theatre, phone, movie_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $seats, $theatre, $phone, $movie_id]);
    
            if ($stmt) {
                $query = $this->connect()->prepare("SELECT * FROM booked_movies WHERE movie_id = ?");
                $query->execute([$movie_id]);
    
                if ($query->rowCount() > 0) {
                    $moviedetails = $query->fetch(PDO::FETCH_ASSOC);
                    $alreadybookedseats = $moviedetails["seats"];
                    $nowbookedseats = $alreadybookedseats . "," . $seats;
    
                    $stm = $this->connect()->prepare("UPDATE booked_movies SET seats = ? WHERE movie_id = ?");
                    $result = $stm->execute([$nowbookedseats, $movie_id]);
    
                    if ($result) {
                        header("Location: ../views/home.php ?error=Successfully Booked Ticket(s)");
                        $stm = null;
                        return true;
                    } else {
                        $stm = null;
                        throw new PDOException("Failed to update booked seats.");
                    }
                } else {
                    $query2 = $this->connect()->prepare("INSERT INTO booked_movies(movie_id, seats) VALUES (?, ?)");
                    $result2 = $query2->execute([$movie_id, $seats]);
    
                    if ($result2) {
                        header("Location: ../views/home.php ?error=Successfully Booked Ticket(s)");
                        $query2 = null;
                        return true;
                    } else {
                        $query2 = null;
                        throw new PDOException("Failed to insert into booked_movies.");
                    }
                }
            } else {
                throw new PDOException("Failed to insert into bookings.");
            }
        } catch (PDOException $e) {
            error_log("PDOException: " . $e->getMessage());
            return false;
        }
    }
    public function selected_seats($movie_id){
        try{
            $query = $this->connect()->prepare("SELECT * FROM booked_movies WHERE movie_id=?");
            $query->execute([$movie_id]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $query=null;
            return $result;
        } catch (PDOException $e) {
            error_log("PDOException". $e->getMessage());
            var_dump($e);
        }
    }
    public function updateUserDetails($firstname,$secondname,$address,$town,$street, $phone, $email, $user_id){
   
        $stmt = $this->connect()->prepare("UPDATE users SET firstname = ?, secondname = ?,
        address = ?, town = ?, street = ?,  phone = ?,  email = ? WHERE user_id = ?");
        try{
           $result = $stmt->execute([$firstname, $secondname, $address, $town, $street, $phone, $email, $user_id]);
           $stmt = null; // Close the statement to free up resources
           header("Location:./userprofile.php? error= successfuly updated your details.");
        }catch(PDOException $e) {
           echo "Error: " . $e->getMessage();
        }


       return $result;
   
    }
    public function updateImage($uploadedFile, $user_id) {
       
        $stmt = $this->connect()->prepare("UPDATE users SET profiles = ? WHERE user_id = ?");
        try{
           $result = $stmt->execute([$uploadedFile, $user_id]);
           $stmt = null; // Close the statement to free up resources
           header("Location:../views/userprofile.php? error= successfuly updated your details.");
        }catch(PDOException $e) {
           echo "Error: " . $e->getMessage();
        }


       return $result;
    
    }
    
    
}
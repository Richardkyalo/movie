<?php
class add_movie extends database
{

    protected function addMovie(
        $movie_name,
        $movie_description,
        $hours,
        $minutes,
        $charge,
        $rating,
        $actor,
        $cover,
        $theatre,
        $date,
        $time
    ) {
        $stmt = $this->connect()->prepare("INSERT INTO movies(movie, movie_description, Length_hours, Length_minutes, charge, rating, actor, cover,
        theatre, date, time, movie_id
       )
        values(?,?,?,?,?,?,?,?,?,?,?,?)");

        function generateRandomString($length = 6)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
        }

        $movie_id = generateRandomString();
        if ($stmt->execute(array($movie_name, $movie_description, $hours, $minutes, $charge, $rating, $actor, $cover, $theatre, $date, $time, $movie_id))) {
            $stmt = null;
            return true;
        } else {
            $stmt = null;
            return false;
        }
    }
    public function getUserDetails($email)
    {
        $stmt = $this->connect()->prepare("SELECT firstname, secondname, address, town, street, theatre, phone, email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null; // Close the statement to free up resources

        return $userDetails;
    }
    public function get_all_movies()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM movies");
        $stmt->execute();
        $all_movies = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $stmt = null;
        return $all_movies;
    }
    public function get_all_theatres()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM theatres");
        $stmt->execute();
        $all_movies = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $stmt = null;
        return $all_movies;
    }
    public function get_all_employeedetail($user_id)
    {
        $stmt = $this->connect()->prepare("SELECT theatre FROM users WHERE user_id=?");
        $stmt->execute([$user_id]);
        $employeedetail = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        return $employeedetail;
    }
    public function get_movie($movie)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM movies WHERE movie=?");
        $stmt->execute([$movie]);
        $movieDetails = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        return $movieDetails;
    }
    protected function update_movie(
        $movie_name,
        $movie_description,
        $length_hours,
        $length_minutes,
        $charge,
        $rating,
        $actor,
        $cover,
        $theatre,
        $date,
        $time,
        $movie
    ) {
        $stmt = $this->connect()->prepare("UPDATE movies SET movie = ?, movie_description = ?,
        length_hours = ?, length_minutes = ?, charge = ?, rating = ?, actor = ?,  cover = ?, theatre=?, date=?, time=? WHERE movie = ?");
        try {
            $result = $stmt->execute([$movie_name, $movie_description, $length_hours, $length_minutes, $charge, $rating, $actor, $cover, $theatre, $date, $time, $movie]);
            $stmt = null; // Close the statement to free up resources
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }


        return $result;
    }
    public function bookings() {
        $sql = $this->connect()->prepare("SELECT movie_id, seats FROM booked_movies");
        $sql->execute();
        $counts = array();
    
        if ($sql->rowCount() > 0) {
            $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
    
            foreach ($rows as $row) {
                $movie_id = $row['movie_id'];
    
                // Retrieve the movie name and charge from the movies table using movie_id
                $stmt = $this->connect()->prepare("SELECT movie, charge FROM movies WHERE movie_id = ?");
                $stmt->execute([$movie_id]);
                $movie_data = $stmt->fetch(PDO::FETCH_ASSOC);
    
                $movie_name = $movie_data['movie'];
                $charge = $movie_data['charge'];
    
                $seats = explode(',', $row['seats']);
    
                if (!isset($counts[$movie_name])) {
                    $counts[$movie_name] = array(
                        'charge' => $charge,
                        'total_booked_seats' => 0
                    );
                }
    
                $counts[$movie_name]['total_booked_seats'] += count($seats);
            }
        } else {
            echo "No bookings found.";
        }
    
        return $counts;
    }
    
    
    public function deleteMovie($movie)
    {
        $stmt = $this->connect()->prepare("DELETE FROM movies WHERE movie = ?");
        try {
            if ($stmt->execute([$movie])) {
                $stmt = null;
                header("Location: ../views/adminmovies.php");
            }
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }
    public function getRecomendations($email)
    {
        $stmt = $this->connect()->prepare("SELECT firstname FROM users WHERE email=?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $firstname = $stmt->fetch(PDO::FETCH_ASSOC)['firstname'];
            $query = $this->connect()->prepare("SELECT * FROM bookings WHERE name=?");
            $query->execute([$firstname]);
            if ($query->rowCount() > 0) {
                $data = $query->fetchALL(PDO::FETCH_ASSOC);
                $ratings = array();
                foreach ($data as $data1) {
                    $movieid = $data1['movie_id'];
                    $statement = $this->connect()->prepare("SELECT rating FROM movies WHERE movie_id=?");
                    $statement->execute([$movieid]);
                    $rating = $statement->fetch(PDO::FETCH_ASSOC)['rating']; // Fix here
                    if ($rating !== false) {
                        $ratings[] = $rating;
                    }
                }
                $average_rating = count($ratings) > 0 ? array_sum($ratings) / count($ratings) : 0;
                $recommendation_query = $this->connect()->prepare("SELECT * FROM movies WHERE rating > ?");
                $recommendation_query->execute([$average_rating]);
                $recommendations = $recommendation_query->fetchAll(PDO::FETCH_ASSOC);

                return $recommendations;
            }
        }
    }
}

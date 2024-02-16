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
    public function get_all_employeedetail($user_id){
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
}

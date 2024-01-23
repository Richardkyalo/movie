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
        $selectedTheatre1,
        $selectedDates1,
        $selectedTimes1,
        $selectedTheatre2,
        $selectedDates2,
        $selectedTimes2,
        $selectedtheatre3,
        $selectedDates3,
        $selectedTimes3
    ) {
        $stmt = $this->connect()->prepare("INSERT INTO movies(movie, movie_description, Length_hours, Length_minutes, charge, rating, actor, cover,
        selectedtheatre1, selecteddate1, selectedtime1, selectedtheatre2, selecteddate2, selectedtime2, selectedtheatre3, 
        selecteddate3, selectedtime3)
        values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        if ($stmt->execute(array($movie_name, $movie_description, $hours, $minutes, $charge, $rating, $actor, $cover, $selectedTheatre1, $selectedDates1,
        $selectedTimes1, $selectedTheatre2, $selectedDates2, $selectedTimes2, $selectedtheatre3, $selectedDates3, $selectedTimes3))) {
            $stmt = null;
            return true;
        } else {
            $stmt=null;
            return false;
        }
    }
    public function getAllTheatreDetails()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM theatres");
        $stmt->execute();
        $allTheatreDetails = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $stmt = null;
        return $allTheatreDetails;
    }
}

<?php
class adminprofile extends database {

    public function getUserDetails($email) {
        $stmt = $this->connect()->prepare("SELECT firstname, secondname, address, town, street, theatre, phone, email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null; // Close the statement to free up resources

        return $userDetails;
    }

    public function getAllUsers() {
        $stmt = $this->connect()->prepare("SELECT * FROM users");
        $stmt->execute();
        $allUserDetails = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $stmt = null; // Close the statement to free up resources
        return $allUserDetails;
    }
    public function getAllTheatreDetails() {
        $stmt = $this->connect()->prepare("SELECT * FROM theatres");
        $stmt->execute();
        $allTheatreDetails = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $stmt = null;
        return $allTheatreDetails;
    }
    protected function updateUserDetails($firstname, $secondname, $address, $town, 
    $street, $theatre, $phone, $email) {
        $stmt = $this->connect()->prepare("UPDATE users SET firstname = ?, secondname = ?,
         address = ?, town = ?, street = ?, theatre = ?, phone = ?,  email = ? WHERE email = ?");
         try{
            $result = $stmt->execute([$firstname, $secondname, $address, $town, $street, $theatre, $phone, $email, $email]);
            $stmt = null; // Close the statement to free up resources
         }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
         }


        return $result;
    }
    protected function updateUserProfile($profile, $email)
    {
        try {
            $stmt = $this->connect()->prepare("UPDATE users SET firstname = ? WHERE email = ?");
            $result = $stmt->execute([$profile, $email]);
            $stmt = null; // Close the statement to free up resources
            return $result;
        } catch (PDOException $e) {
            // Log the error or handle it appropriately
            error_log("PDOException: " . $e->getMessage());
            // Optionally, you can rethrow the exception to propagate it further
            throw $e;
        }
    }
    
}
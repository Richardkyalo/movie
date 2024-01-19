<?php
class adminprofile extends database {

    public function getUserDetails($email) {
        $stmt = $this->connect()->prepare("SELECT firstname, secondname, address, town, street, theatre, phone, email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null; // Close the statement to free up resources

        return $userDetails;
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
}
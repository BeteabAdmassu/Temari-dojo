<?php


class Signin {
    private $conn;
    private $table = 'user';

    // properties
    public $id;
    public $firstname;
    public $lastname;
    public $username;
    public $email;
    public $phoneNo;
    public $address;
    public $password;
    public $userHash;

    public function __construct($db) {
        $this->conn = $db;
        
    }
    
      //authenticate user
    public function authenticate() {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email AND password = :password';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        //hash
        $this->password = hash('sha256',$this->password);

        // Bind data
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);

        $this->userHash = hash('sha256', $this->email.$this->password);

        // Execute query
        if($stmt->execute()) {
            $num=$stmt->rowCount();
            if($num>0){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->username = $row['username'];
                setcookie("user_cookies",$this->userHash, time() + 3600, '/');
            return true;
            }
            else{
                return false;
            }

        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }


    




}

?>

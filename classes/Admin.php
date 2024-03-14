<?php declare(strict_types=1);

//require('classes/User.php');

class Admin {

    private $conn;

    public function __construct() {

        $servername = "localhost";
        $username = "root"; 
        $password = "@Gtxrtx399#"; 
        $dbname = "PHP_TASK"; 
        
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        $this->conn->close();
    }

    public function generatePassword() {
        $secure = true;
        $randomString = openssl_random_pseudo_bytes(8, $secure);
        $password = bin2hex($randomString);
        $password = substr($password, 0, 8);
        return $password;
    }

    public function createTableUser($fname, $lname, $email, $phone, $password) {
        $sql = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(50),
            last_name VARCHAR(50),
            email VARCHAR(100),
            phone VARCHAR(20),
            password VARCHAR(255)
        )";
        if ($this->conn->query($sql) === TRUE) {
            echo "Table 'users' created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        $this->createEmployee($fname, $lname, $email, $phone, $password);
    }

    public function createEmployee($fname, $lname, $email, $phone, $password) {
        $tableExists = "SHOW TABLES LIKE 'users'";
        if($this->conn->query($tableExists)->num_rows > 0)
        {   
            $sql = "INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            if($password == 'on') {
                $password = $this->generatePassword();
            }
            $stmt->bind_param("sssss", $fname, $lname, $email, $phone, $password);
            if ($stmt->execute() === TRUE) {
                echo "Employee created successfully username is ".$fname." &password is ".$password;
                header("Location: /signin.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $this->createTableUser($fname, $lname, $email, $phone, $this->generatePassword());
        }
    }

}
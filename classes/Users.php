<?php

declare(strict_types=1);

session_start();

class Users {

    private $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "root"; 
        $password = "@Gtxrtx399#"; 
        $dbname = "PHP_TASK"; 
        
        // Establish database connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }  

    public function __destruct() {
        // Close database connection when object is destroyed
        $this->conn->close();
    }

    public function signin($email, $password) {
        $tableExists = "SHOW TABLES LIKE 'users'";
        
        // Check if the table exists in the database
        if ($this->conn->query($tableExists)->num_rows > 0) {
            // Prepare SQL statement
            $sql_check = "SELECT * FROM users WHERE email = ? AND password = ?";
            $stmt_check = $this->conn->prepare($sql_check);
            
            // Bind parameters
            $stmt_check->bind_param("ss", $email, $password);
            
            // Execute query
            $stmt_check->execute();
            
            // Get result
            $result = $stmt_check->get_result();
            
            // Check if user exists
            if ($result->num_rows >= 1) {
                // Start session
                
                // Redirect to dashboard

                $_SESSION['username'] = $email;
                header("Location: /dashboard.phtml");
                
                exit();
            } else {
                // die('sdfsdf');
                // User not found, redirect to signin page with error message
                $message = 'Incorrect username or password';
                header("Location: /signin.phtml?message=" . urlencode($message));
                exit();
            }
        } else {
            // Table not found, redirect to signin page with error message
            $message = 'User table does not exist';
            header("Location: /signin.phtml?message=" . urlencode($message));
            exit();
        } 
    }

    public function signout() {
        // Destroy session
        session_destroy();
        
        // Redirect to signin page
        
        $message = 'Successfully Logout';
        header("Location: /signin.phtml?message=" . urlencode($message));
        exit();
    }

    public function changePassword() {
        die($_POST['newPassword']);
        if (isset($_POST['newPassword'])) {
            $newPassword = $_POST['newPassword'];
            echo "Password changed successfully!";
        } else {
            echo "No password provided.";
        }
    }

}
?>
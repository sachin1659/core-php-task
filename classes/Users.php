<?php declare(strict_types=1);

//require('classes/User.php');
namespace PHP101\classes\Users;

class Users {

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

    public function signIn($email, $password) {
        die('sdjkf');
        try {
            $tableExists = "SHOW TABLES LIKE 'users'";

            die('dfd');
            if ($this->conn->query($tableExists)->num_rows > 0) {
                $sql_check = "SELECT * FROM users WHERE email = ?";
                $stmt_check = $this->conn->prepare($sql_check);
                $stmt_check->bind_param("s", $email);
                $stmt_check->execute();
                $result = $stmt_check->get_result();
                if ($result->num_rows == 1) {
                    die('dfd');
                    $row = $result->fetch_assoc();
                    // Verify the password
                    if (password_verify($password, $row['password'])) {
                        // Redirect to dashboard if the password is correct
                        header("Location: dashboard.php");
                    } else {
                        // Redirect to signin page with an error message
                        $message = 'Incorrect username or password';
                        header("Location: signin.php?message=" . urlencode($message));
                    }
                } else {
                    // Redirect to signin page with an error message
                    $message = 'User does not exist';
                    header("Location: signin.php?message=" . urlencode($message));
                    exit();
                }
            } else {
                $this->createTableUser($fname, $lname, $email, $phone, $this->generatePassword());
            }
        } catch (\Exception $e) {
            print_r($e->getMessage() . " exception in line " . $e->getLine() . " in file " . $e->getFile()); 
            die();
        } catch (\Error $e) {
            print_r($e->getMessage() . " error in line " . $e->getLine() . " in file " . $e->getFile());
            die();
        }
    }
    

}
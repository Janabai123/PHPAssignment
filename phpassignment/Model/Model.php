<?php
class Model {
    protected $db;

    public function __construct() {
        // Initialize your database connection here


        $host="localhost";
        $username="root";
        $password="";
        $database_name="employee_info";

        $this->db = new mysqli($host,$username,$password,$database_name);

        if ($this->db->connect_error) {
            die("Database connection failed: " . $this->db->connect_error);
        }
        // else{
        //     echo"connection successifull..";
        // }


 // Select the database
 $this->db->select_db($database_name);

 // SQL statement to create the 'employees' table
 $createTableSQL = "CREATE TABLE IF NOT EXISTS employees (
     employee_id INT AUTO_INCREMENT PRIMARY KEY,
     first_name VARCHAR(255) NOT NULL,
     last_name VARCHAR(255) NOT NULL,
     birthdate DATE NOT NULL,
     gender ENUM('Male', 'Female') NOT NULL,
     designation VARCHAR(255) NOT NULL,
     salary DECIMAL(10, 2) NOT NULL,
     hobbies TEXT NOT NULL,
     status ENUM('Experienced', 'Fresher') NOT NULL
 )";

 // Execute the SQL statement to create the table
 if ($this->db->query($createTableSQL) === TRUE) {
    //  echo "Table created successfully<br>";
 } 
 else {
     echo "Error creating table: " . $this->db->error . "<br>";
 }

    }


    public function __destruct() {
        // Close the database connection here
        $this->db->close();
    }
}


?>

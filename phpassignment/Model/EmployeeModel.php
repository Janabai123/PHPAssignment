
<?php
require_once 'Model.php';

class EmployeeModel extends Model {
    // Method to add a new employee
    public function addEmployee($data) {
        // Perform SQL INSERT operation to add a new employee
        $query = "INSERT INTO employees (first_name, last_name, birthdate, gender, designation, salary, hobbies, status)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssssss", $data['first_name'], $data['last_name'], $data['birthdate'], $data['gender'], $data['designation'], $data['salary'], $data['hobbies'], $data['status']);
        
        if ($stmt->execute()) {
            return true; // Success
        } else {
            return false; // Error
        }
    }

    // Method to update an existing employee
    public function updateEmployee($data) {
        // Perform SQL UPDATE operation to update an employee
        $query = "UPDATE employees
                  SET first_name = ?, last_name = ?, birthdate = ?, gender = ?, designation = ?, salary = ?, hobbies = ?, status = ?
                  WHERE employee_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssssssi", $data['first_name'], $data['last_name'], $data['birthdate'], $data['gender'], $data['designation'], $data['salary'], $data['hobbies'], $data['status'], $data['employee_id']);
        
        if ($stmt->execute()) {
            return true; // Success
        } else {
            return false; // Error
        }
    }

    // Method to delete an employee by ID
    public function deleteEmployee($employee_id) {
        // Perform SQL DELETE operation to delete an employee
        $query = "DELETE FROM employees WHERE employee_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $employee_id);

        if ($stmt->execute()) {
            return true; // Success
        } else {
            return false; // Error
        }
    }

    // Method to fetch all employees from the database
    public function getAllEmployees() {
        // Perform SQL SELECT operation to retrieve all employees
        $query = "SELECT * FROM employees";
        $result = $this->db->query($query);

        if ($result) {
            $employees = $result->fetch_all(MYSQLI_ASSOC);
            return $employees;
        } else {
            return []; // No employees found or error
        }
    }

    // Method to fetch an employee by ID
    public function getEmployeeById($employee_id) {
        // Perform SQL SELECT operation to retrieve an employee by ID
        $query = "SELECT * FROM employees WHERE employee_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $employee = $result->fetch_assoc();
            return $employee;
        } else {
            return null; // Employee not found or error
        }
    }
}
?>



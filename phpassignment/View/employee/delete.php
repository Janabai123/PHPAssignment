<?php
require_once '../../model/EmployeeModel.php';

// Check if the employee ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the employee ID from the URL
    $employeeId = $_GET['id'];

    // Create an instance of EmployeeModel
    $employeeModel = new EmployeeModel();

    // Call the deleteEmployee method to delete the employee by ID
    if ($employeeModel->deleteEmployee($employeeId)) {
        // Deletion successful, you can redirect to a success page or perform other actions
        header('Location: view.php');
        exit;
    } else {
      
        echo "Failed to delete employee.";
    }
} else {

    echo "Employee ID not provided.";
}
?>

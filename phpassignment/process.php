<?php

require_once 'model/EmployeeModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'birthdate' => $_POST['birthdate'],
        'gender' => $_POST['gender'],
        'designation' => $_POST['designation'],
        'salary' => $_POST['salary'],
        'hobbies' => implode(', ', $_POST['hobbies']), // Convert hobbies array to comma-separated string
        'status' => $_POST['status'],
    ];

    // Create an instance of EmployeeModel
    $employeeModel = new EmployeeModel();

    // Call the addEmployee method to insert the data
    if ($employeeModel->addEmployee($data)) {
        // Insertion successful, you can redirect to a success page or perform other actions
        header('Location:./view/employee/view.php');
        exit;
    } else {
        // Insertion failed, handle the error (e.g., show an error message)
        echo "Failed to insert employee data.";
    }


    // Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $data = [
        'employee_id' => $_POST['employee_id'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'birthdate' => $_POST['birthdate'],
        'gender' => $_POST['gender'],
        'designation' => $_POST['designation'],
        'salary' => $_POST['salary'],
        'hobbies' => implode(', ', $_POST['hobbies']), // Convert hobbies array to comma-separated string
        'status' => $_POST['status'],
    ];

    // Create an instance of EmployeeModel
    $employeeModel = new EmployeeModel();

    // Call the updateEmployee method to update the data
    if ($employeeModel->updateEmployee($data)) {
        // Update successful, you can redirect to a success page or perform other actions
        header('Location: view.php');
        exit;
    } else {
        // Update failed, handle the error (e.g., show an error message)
        echo "Failed to update employee data.";
    }
}



}
?>

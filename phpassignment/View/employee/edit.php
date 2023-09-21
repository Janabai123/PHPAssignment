<?php
require_once '../../model/EmployeeModel.php';

// Initialize variables for employee data
$employeeId = '';
$firstName = '';
$lastName = '';
$birthdate = '';
$gender = '';
$designation = '';
$salary = '';
$hobbies = '';
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // Get the employee ID from the URL
    $employeeId = $_GET['id'];

    // Create an instance of EmployeeModel
    $employeeModel = new EmployeeModel();

    // Fetch the employee data by ID
    $employee = $employeeModel->getEmployeeById($employeeId);

    if ($employee) {
        // Assign employee data to variables
        $employeeId = $employee['employee_id']; // Added this line to ensure employee_id is set
        $firstName = $employee['first_name'];
        $lastName = $employee['last_name'];
        $birthdate = $employee['birthdate'];
        $gender = $employee['gender'];
        $designation = $employee['designation'];
        $salary = $employee['salary'];
        $hobbies = explode(', ', $employee['hobbies']); // Convert hobbies string to an array
        $status = $employee['status'];
    } else {
        // Employee not found, you can handle this case (e.g., redirect to an error page)
        echo "Employee not found.";
        exit;
    }
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
        'hobbies' => implode(', ', $_POST['hobbies']), 
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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee Information</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <style>
             
        label {
            font-size: 20px;
            font-weight:500;
        }

       
        input[type="text"],
        input[type="number"],
        select {
            font-size: 20px;
        }

        #employeeForm {
            background-color: white; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
            padding-left:150px;
        }
    </style>

</head>
<body>

<?php
// Include the footer
include('./header.php');
?>

    <div class="container m-3 p-5">
        <h2  style="text-align:center;padding-bottom:30px;margin-top:20px;padding-left:150px">Update Employee Information</h2>
        <form id="employeeForm" method="post" style="margin-left:300px;">
            <div class="form-group">
                <input type="hidden" style="width: 400px;" name="employee_id" value="<?php echo $employeeId; ?>">
                <label for="first_name">First Name:</label>
                <input type="text" style="width: 400px;" class="form-control" id="first_name" name="first_name" value="<?php echo $firstName; ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" style="width: 400px;" id="last_name" name="last_name" value="<?php echo $lastName; ?>" required>
            </div>
            <div class="form-group" >
                <label for="birthdate">Birthdate:</label>
                <input type="date"  class="form-control" style="width: 400px;" id="birthdate" name="birthdate" value="<?php echo $birthdate; ?>" required >
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input"  id="male" name="gender" value="Male" <?php echo ($gender === 'Male') ? 'checked' : ''; ?> required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="female" name="gender" value="Female" <?php echo ($gender === 'Female') ? 'checked' : ''; ?> required>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" class="form-control" style="width: 400px;" id="designation" name="designation" value="<?php echo $designation; ?>" required>
            </div>
            <div class="form-group">
                <label for="salary">Salary (Numeric only):</label>
                <input type="number" class="form-control" style="width: 400px;" id="salary" name="salary" value="<?php echo $salary; ?>" required>
            </div>
            <div class="form-group">
                <label for="hobbies">Hobbies (Select multiple):</label>
                <select multiple class="form-control" id="hobbies" style="width: 400px;" name="hobbies[]">
                    <option value="Reading" <?php echo (in_array('Reading', $hobbies)) ? 'selected' : ''; ?>>Reading</option>
                    <option value="Sports" <?php echo (in_array('Sports', $hobbies)) ? 'selected' : ''; ?>>Sports</option>
                    <option value="Music" <?php echo (in_array('Music', $hobbies)) ? 'selected' : ''; ?>>Music</option>
                    <option value="Travel" <?php echo (in_array('Travel', $hobbies)) ? 'selected' : ''; ?>>Travel</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" style="width: 400px;" name="status" required>
                    <option value="Experienced" <?php echo ($status === 'Experienced') ? 'selected' : ''; ?>>Experienced</option>
                    <option value="Fresher" <?php echo ($status === 'Fresher') ? 'selected' : ''; ?>>Fresher</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="width:200px;margin-bottom:50px">Update</button>
        </form>
    </div>

    <?php
// Include the footer
include('./footer.php');
?>
</body>
</html>

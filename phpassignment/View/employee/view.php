
<?php
require_once '../../model/EmployeeModel.php';

// Create an instance of EmployeeModel
$employeeModel = new EmployeeModel();

// Fetch all employees from the database
$employees = $employeeModel->getAllEmployees();

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php
// Include the footer
include('./header.php');
?>
    <div class="container">
    
        <h2 style="text-align:center;padding-bottom:30px;margin-top:50px"> Employee Data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10%" >Employee ID</th>
                    <th style="width: 40%">First Name</th>
                    <th style="width: 40%">Last Name</th>
                    <th style="width: 20%">Birthdate</th>
                    <th style="width: 10%">Gender</th>
                    <th style="width: 25%">Designation</th>
                    <th style="width: 10%">Salary(₹)</th>
                    <th style="width: 10%">Hobbies</th>
                    <th style="width: 20%">Status</th>
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo $employee['employee_id']; ?></td>
                    <td><?php echo $employee['first_name']; ?></td>
                    <td><?php echo $employee['last_name']; ?></td>
                    <td><?php echo $employee['birthdate']; ?></td>
                    <td><?php echo $employee['gender']; ?></td>
                    <td><?php echo $employee['designation']; ?></td>
                  

                    <td><?php echo number_format($employee['salary'], 0); ?></td>
                    <td><?php echo $employee['hobbies']; ?></td>
                    <td><?php echo $employee['status']; ?></td>
               

        <td>
                       
                        <div class="btn-group">
                            <a href="edit.php?id=<?php echo $employee['employee_id']; ?>" class="btn btn-warning px-3 rounded mr-3">Edit</a>
                            <a href="delete.php?id=<?php echo $employee['employee_id']; ?>" class="btn btn-danger px-3 rounded mr-3">Delete</a>
                        </div>
                    
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
     
    </div>
    <?php
// Include the footer
include('./footer.php');
?>
</body>
</html> 




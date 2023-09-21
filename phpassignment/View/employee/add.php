<!DOCTYPE html>
<html>
<head>
    <title>Employee Information</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        label {
            font-size: 20px;
            font-weight: 500;
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
            padding-left: 150px;
        }
    </style>
</head>
<body>

<?php
// Include the footer
include('./header.php');
?>

<div class="container m-3 p-5">
    <h2 style="text-align:center;padding-bottom:30px;margin-top:20px;padding-left:150px"> Add Employee Information</h2>
    <form id="employeeForm" method="post" action="../../process.php" style="margin-left:300px;">
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" style="width: 400px;" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" style="width: 400px;" required>
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" style="width: 400px;" required>
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="male" name="gender" value="Male" required>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="female" name="gender" value="Female" required>
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>
        <div class="form-group">
            <label for="designation">Designation:</label>
            <input type="text" class="form-control" id="designation" name="designation" style="width: 400px;" required>
        </div>
        <div class="form-group">
            <label for="salary">Salary (Numeric only):</label>
            <input type="number" class="form-control" id="salary" name="salary" style="width: 400px;" required>
        </div>
        <div class="form-group">
            <label for="hobbies">Hobbies (Select multiple):</label>
            <select  class="form-control" id="hobbies" style="width: 400px;" name="hobbies[]" multiple>
                <option value="Reading">Reading</option>
                <option value="Sports">Sports</option>
                <option value="Music">Music</option>
                <option value="Travel">Travel</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" style="width: 400px;" required>
                <option value="Experienced">Experienced</option>
                <option value="Fresher">Fresher</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" style="width:200px;margin-bottom:50px">Save</button>
    </form>
</div>


<?php
// Include the footer
include('./footer.php');
?>

</body>
</html>

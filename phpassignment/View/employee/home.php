<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            background: linear-gradient(to bottom,  #ADD8E6, #00bcd4); 
            min-height: 100vh; 
        }

        /* Style for sticky footer */
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa; 
            padding: 20px 0; 
            text-align: center;
        }
    </style>
</head>

<body>
<?php
// Include the header
include('./header.php');
?>

<div class="text-center mt-5 pt-5">
        <h1 style="margin-bottom:50px">WEL - COME</h1>
        <a href="view.php" class="btn btn-dark" style="width: 170px;">Next</a>
    </div>
    
    <?php
// Include the footer
include('./footer.php');
?>
</body>
</html>

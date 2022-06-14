<?php

require_once('../functions/Classes.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="#" method="POST">
            <div class="form-group">
                <label class="mb-2 mt-4 fw-bold">Class Number</label>
                <input type="number" class="form-control" placeholder="Enter class number" name="ClassNumber">
                <label class="mb-2 mt-4 fw-bold">Class Name</label>
                <input type="text" class="form-control" placeholder="Enter class name" name="ClassName">
            </div>
            <button type="submit" class="btn btn-primary mt-4">Add</button>
        </form>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
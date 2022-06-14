<?php
require_once('../functions/Students.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label class="mb-2 mt-4 fw-bold">Student Number</label>
                <input type="number" class="form-control" placeholder="Enter student number" name="StudentNumber">
                <label class="mb-2 mt-4 fw-bold">Student Name</label>
                <input type="text" class="form-control" placeholder="Enter student name" name="StudentName">
                <label class="mb-2 mt-4 fw-bold">Birth Date</label>
                <input type="date" class="form-control" name="StudentBirthDate">
                <label class="mb-2 mt-4 fw-bold">Student Address</label>
                <input type="text" class="form-control" placeholder="Enter student address" name="StudentAddress">
                <label class="mb-2 mt-4 fw-bold">Student Picture</label>
                <input type="file" class="form-control" placeholder="Enter student picture" name="StudentPicture">
                <label class="mb-2 mt-4 fw-bold">Student Class</label>
                <input type="text" class="form-control" placeholder="Enter student class" name="StudentClass">
            </div>
            <button type="submit" class="btn btn-primary mt-4">Add</button>
        </form>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
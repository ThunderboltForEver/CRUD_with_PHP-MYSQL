<?php
require_once('../functions/Marks.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Marks</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label class="mb-2 mt-4 fw-bold">Marks Number</label>
                <input type="number" class="form-control" placeholder="Enter marks number" name="MarksNumber">
                <label class="mb-2 mt-4 fw-bold">Marks</label>
                <input type="text" class="form-control" placeholder="Enter marks" name="Marks">
                <label class="mb-2 mt-4 fw-bold">Student Name</label>
                <input type="text" class="form-control" placeholder="Enter student name" name="StudentName">
                <label class="mb-2 mt-4 fw-bold">Subject Name</label>
                <input type="text" class="form-control" placeholder="Enter subject name" name="SubjectName">

            </div>
            <button type="submit" class="btn btn-primary mt-4">Add</button>
        </form>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
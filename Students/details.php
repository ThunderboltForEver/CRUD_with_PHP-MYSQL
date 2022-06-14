<?php
require_once('../db.php');

$stud_num = $_GET['studentNum'];
$sql = "SELECT * FROM students WHERE student_number = $stud_num";
$sql2 = "DELETE FROM students WHERE student_number = $stud_num";
if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
    $rows = mysqli_fetch_assoc($result);
}
if (isset($_POST['StudentNumber'])) {
    mysqli_query($GLOBALS['conn'], $sql2);
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="#" method="POST">
            <div class="form-group">
                <label class="mb-2 mt-4 fw-bold">Student Number</label>
                <input type="number" class="form-control" name="StudentNumber" readonly value="<?php echo $rows['student_number']; ?>">
                <label class="mb-2 mt-4 fw-bold">Student Name</label>
                <input type="text" class="form-control" name="StudentName" readonly value="<?php echo $rows['student_name']; ?>">
                <label class="mb-2 mt-4 fw-bold">Birth Date</label>
                <input type="date" class="form-control" name="StudentBirthDate" readonly value="<?php echo $rows['birth_date']; ?>">
                <label class="mb-2 mt-4 fw-bold">Student Address</label>
                <input type="text" class="form-control" name="StudentAddress" readonly value="<?php echo $rows['student_address']; ?>">
                <label class="mb-2 mt-4 fw-bold">Student Picture</label>
                <input type="text" class="form-control" name="StudentPicture" readonly value="<?php echo $rows['student_picture']; ?>">
                <label class="mb-2 mt-4 fw-bold">Student Class</label>
                <input type="text" class="form-control" name="StudentClass" readonly value="<?php echo $rows['student_class']; ?>">
            </div>
            <button type="submit" class="btn btn-danger mt-4">Delete</button>&nbsp;&nbsp;<a href="index.php" class="btn btn-dark mt-4">Back</a>
        </form>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
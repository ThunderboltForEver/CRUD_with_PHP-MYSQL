<?php
require_once('../db.php');
$teacher_num = $_GET['teacherNum'];
$sql = "SELECT * FROM teachers WHERE teacher_number = $teacher_num";
$sql2 = "DELETE FROM teachers WHERE teacher_number = $teacher_num";

if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
    $rows = mysqli_fetch_assoc($result);
} else {
    die('Error In Fetching Data');
}
if (isset($_POST['TeacherNumber'])) {
    mysqli_query($GLOBALS['conn'], $sql2);
    header('Location:index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Teacher</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label class="mb-2 mt-4 fw-bold">Teacher Number</label>
                <input type="number" class="form-control" name="TeacherNumber" readonly value="<?php echo $rows['teacher_number']; ?>">
                <label class="mb-2 mt-4 fw-bold">Teacher Name</label>
                <input type="text" class="form-control" name="TeacherName" readonly value="<?php echo $rows['teacher_name']; ?>">
                <label class="mb-2 mt-4 fw-bold">Birth date</label>
                <input type="text" class="form-control" name="TeacherBirthDate" readonly value="<?php echo $rows['date_birth']; ?>">
                <label class="mb-2 mt-4 fw-bold">Address</label>
                <input type="text" class="form-control" name="TeacherAddress" readonly value="<?php echo $rows['teacher_address']; ?>">
            </div>
            <button type="submit" class="btn btn-danger mt-4">Delete</button>&nbsp;&nbsp;<a href="index.php" class="btn btn-dark mt-4">Back</a>
        </form>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
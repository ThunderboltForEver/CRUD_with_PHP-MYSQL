<?php
require_once('../db.php');

$teacher_num = $_GET['teacherNum'];
$sql = "SELECT * FROM teachers WHERE teacher_number = $teacher_num";

if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
    $rows = mysqli_fetch_assoc($result);
} else {
    die("Error In Fetching Data");
}

if (isset($_POST['TeacherNumber'])) {
    $teacherNumber = $_POST['TeacherNumber'];
    $teacherName = $_POST['TeacherName'];
    $teacherBirth = $_POST['TeacherBirthDate'];
    $teacherAddr = $_POST['TeacherAddress'];
    $sql2 = "UPDATE teachers SET teacher_number = $teacherNumber,teacher_name = '$teacherName',date_birth = '$teacherBirth',teacher_address = '$teacherAddr' WHERE teacher_number = $teacher_num";
    if (mysqli_query($GLOBALS['conn'], $sql2)) {
        header('Location:index.php');
        exit;
    } else {
        die('Error In Updating Data');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label class="mb-2 mt-4 fw-bold">Teacher Number</label>
                <input type="number" class="form-control" name="TeacherNumber" value="<?php echo $rows['teacher_number']; ?>">
                <label class="mb-2 mt-4 fw-bold">Teacher Name</label>
                <input type="text" class="form-control" name="TeacherName" value="<?php echo $rows['teacher_name']; ?>">
                <label class="mb-2 mt-4 fw-bold">Birth date</label>
                <input type="date" class="form-control" name="TeacherBirthDate" value="<?php echo $rows['date_birth']; ?>">
                <label class="mb-2 mt-4 fw-bold">Address</label>
                <input type="text" class="form-control" name="TeacherAddress" value="<?php echo $rows['teacher_address']; ?>">
            </div>
            <button type="submit" class="btn btn-primary mt-4">update</button>
        </form>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
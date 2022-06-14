<?php
require_once('../db.php');

$student_num = $_GET['studentNum'];
$sql = "SELECT * FROM students WHERE student_number = $student_num";

if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
    $rows = mysqli_fetch_assoc($result);
} else {
    die("Error In Fetching Data");
}

if (isset($_POST['StudentNumber'])) {
    $studentNumber = $_POST['StudentNumber'];
    $studentName = $_POST['StudentName'];
    $studentBirth = $_POST['StudentBirthDate'];
    $studentAddr = $_POST['StudentAddress'];
    $studentClass = $_POST['StudentClass'];
    $sql2 = "UPDATE students SET student_number = $studentNumber,student_name = '$studentName',birth_date = '$studentBirth',student_address = '$studentAddr', student_class = '$studentClass' WHERE student_number = $student_num";

    if (mysqli_query($GLOBALS['conn'], $sql2)) {
        if (isset($_POST['StudentPicture']) && $_POST['StudentPicture'] != NULL) {
            $studentPic = $_POST['StudentPicture'];
            $sql3 = "UPDATE students SET student_picture = '$studentPic' WHERE student_number = $student_num";
            mysqli_query($GLOBALS['conn'], $sql3);
        }
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
    <title>Update Student</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label class="mb-2 mt-4 fw-bold">Student Number</label>
                <input type="number" class="form-control" name="StudentNumber" value="<?php echo $rows['student_number']; ?>">
                <label class="mb-2 mt-4 fw-bold">Student Name</label>
                <input type="text" class="form-control" name="StudentName" value="<?php echo $rows['student_name']; ?>">
                <label class="mb-2 mt-4 fw-bold">Birth Date</label>
                <input type="date" class="form-control" name="StudentBirthDate" value="<?php echo $rows['birth_date']; ?>">
                <label class="mb-2 mt-4 fw-bold">Student Address</label>
                <input type="text" class="form-control" name="StudentAddress" value="<?php echo $rows['student_address']; ?>">
                <label class="mb-2 mt-4 fw-bold">Student Picture</label>
                <input type="file" class="form-control" name="StudentPicture">
                <label class="mb-2 mt-4 fw-bold">Student Class</label>
                <input type="text" class="form-control" name="StudentClass" value="<?php echo $rows['student_class']; ?>">
            </div>
            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
require_once('../db.php');

$mark_num = $_GET['markNum'];
$sql = "SELECT * FROM marks WHERE mark_number = $mark_num";

if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
    $rows = mysqli_fetch_assoc($result);
} else {
    die("Error In Fetching Data");
}

if (isset($_POST['MarksNumber'])) {
    $markNumber = $_POST['MarksNumber'];
    $mark = $_POST['Marks'];
    $student = $_POST['StudentName'];
    $subject = $_POST['SubjectName'];
    $sql2 = "UPDATE marks SET mark_number = $markNumber,mark = '$mark',student = '$student',subject_name = '$subject' WHERE mark_number = $mark_num";
    if (mysqli_query($GLOBALS['conn'], $sql2)) {
        header('Location:index.php');
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
    <title>Update Marks</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label class="mb-2 mt-4 fw-bold">Marks Number</label>
                <input type="number" class="form-control" name="MarksNumber" value="<?php echo $rows['mark_number'] ?>">
                <label class="mb-2 mt-4 fw-bold">Marks</label>
                <input type="text" class="form-control" name="Marks" value="<?php echo $rows['mark'] ?>">
                <label class="mb-2 mt-4 fw-bold">Student Name</label>
                <input type="text" class="form-control" name="StudentName" value="<?php echo $rows['student'] ?>">
                <label class="mb-2 mt-4 fw-bold">Subject Name</label>
                <input type="text" class="form-control" name="SubjectName" value="<?php echo $rows['subject_name'] ?>">

            </div>
            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
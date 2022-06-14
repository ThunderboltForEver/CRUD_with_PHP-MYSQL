<?php
require_once('../db.php');

$sub_num = $_GET['subjectNum'];
$sql = "SELECT * FROM subjects WHERE subject_number = $sub_num";
$sql2 = "DELETE FROM subjects WHERE subject_number = $sub_num";
if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
    $rows = mysqli_fetch_assoc($result);
} else {
    echo ('Error In Fetching Data');
}
if (isset($_POST['SubjectNumber'])) {
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
    <title> Delete Subject</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label class="mb-2 mt-4 fw-bold">Subject Number</label>
                <input type="number" class="form-control" name="SubjectNumber" readonly value="<?php echo $rows['subject_number']; ?>">
                <label class="mb-2 mt-4 fw-bold">Subject Name</label>
                <input type="text" class="form-control" name="SubjectName" readonly value="<?php echo $rows['subject_name']; ?>">
                <label class="mb-2 mt-4 fw-bold">Teacher Name</label>
                <input type="text" class="form-control" name="TeacherName" readonly value="<?php echo $rows['teacher_name']; ?>">

            </div>
            <button type="submit" class="btn btn-danger mt-4">Delete</button>&nbsp;&nbsp;<a href="index.php" class="btn btn-dark mt-4">Back</a>
        </form>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
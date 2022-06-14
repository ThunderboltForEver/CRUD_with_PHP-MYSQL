<?php
require_once('../db.php');
$sub_num = $_GET['subjectNum'];
$sql = "SELECT * FROM subjects WHERE subject_number = $sub_num";
if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
    $rows = mysqli_fetch_assoc($result);
}
if (isset($_POST['SubjectNumber'])) {
    $subjectNumber = $_POST['SubjectNumber'];
    $subjectName = $_POST['SubjectName'];
    $teacherName = $_POST['TeacherName'];
    $sql2 = "UPDATE subjects SET subject_number = $subjectNumber,subject_name = '$subjectName',teacher_name = '$teacherName' WHERE subject_number = $sub_num";
    if (mysqli_query($GLOBALS['conn'], $sql2)) {
        header('Location:index.php');
    } else die('Error In Updating Data');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update Subject</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label class="mb-2 mt-4 fw-bold">Subject Number</label>
                <input type="number" class="form-control" name="SubjectNumber" value="<?php echo $rows['subject_number'] ?>">
                <label class="mb-2 mt-4 fw-bold">Subject Name</label>
                <input type="text" class="form-control" name="SubjectName" value="<?php echo $rows['subject_name'] ?>">
                <label class="mb-2 mt-4 fw-bold">Teacher Name</label>
                <input type="text" class="form-control" name="TeacherName" value="<?php echo $rows['teacher_name'] ?>">

            </div>
            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
require_once('../db.php');

if (isset($_POST['StudentNumber'])) {
    $studentNumber = $_POST['StudentNumber'];
    $studentName = $_POST['StudentName'];
    $studentBirth = $_POST['StudentBirthDate'];
    $studentAddress = $_POST['StudentAddress'];
    $studentPic = $_POST['StudentPicture'];
    $studentClass = $_POST['StudentClass'];
    $sql = "INSERT INTO students VALUES ($studentNumber,' $studentName','$studentBirth','$studentAddress','$studentPic','$studentClass')";
    if (mysqli_query($GLOBALS['conn'], $sql)) {
        header('Location: ../Students/index.php');
        exit;
    } else {
        die('Error In Adding');
    }
}

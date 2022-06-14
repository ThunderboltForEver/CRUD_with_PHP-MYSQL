<?php
require_once('../db.php');

if (isset($_POST['SubjectNumber'])) {
    $subjectNumber = $_POST['SubjectNumber'];
    $subjectName = $_POST['SubjectName'];
    $teacherName = $_POST['TeacherName'];
    $sql = "INSERT INTO subjects VALUES ($subjectNumber,'$subjectName','$teacherName')";
    if (mysqli_query($GLOBALS['conn'], $sql)) {
        header('Location: ../Subjects/index.php');
        exit;
    } else {
        die('Error In Adding');
    }
}

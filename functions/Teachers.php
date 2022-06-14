<?php
require_once('../db.php');

if (isset($_POST['TeacherNumber'])) {
    $teacherNumber = $_POST['TeacherNumber'];
    $teacherName = $_POST['TeacherName'];
    $teacherBirth = $_POST['TeacherBirthDate'];
    $teacherAddr = $_POST['TeacherAddress'];
    $sql = "INSERT INTO teachers VALUES ($teacherNumber,'$teacherName','$teacherBirth','$teacherAddr')";
    if (mysqli_query($GLOBALS['conn'], $sql)) {
        header('Location:../Teachers/index.php');
        exit;
    } else {
        die("Error In Adding");
    }
}

<?php
require_once('../db.php');

if (isset($_POST['MarksNumber'])) {
    $markNumber = $_POST['MarksNumber'];
    $mark = $_POST['Marks'];
    $studentName = $_POST['StudentName'];
    $subject = $_POST['SubjectName'];

    $sql = "INSERT INTO marks VALUES ($markNumber,' $mark','$studentName','$subject')";
    if (mysqli_query($GLOBALS['conn'], $sql)) {
        header('Location: ../Marks/index.php');
        exit;
    } else {
        die('Error In Adding');
    }
}

<?php
require_once('../db.php');

if (isset($_POST['ClassNumber'])) {
    $class_number = $_POST['ClassNumber'];
    $class_name = $_POST['ClassName'];
    $sql = "INSERT INTO classes(class_number,class_name) VALUES($class_number,'$class_name')";
    if (mysqli_query($GLOBALS['conn'], $sql)) {
        header('Location:../Classes/index.php');
        exit;
    } else {
        die("Error");
    }
}

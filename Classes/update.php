<?php
require_once('../db.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Class</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <?php
    $class_num = $_GET['classNum'];

    $sql = "SELECT * FROM classes WHERE class_number=$class_num";

    // echo $sql;
    if ($result = mysqli_query($GLOBALS['conn'], $sql)) {

        $row = mysqli_fetch_assoc($result);
    }
    if (isset($_POST['ClassNumber'])) {
        $class_num2 = $_POST['ClassNumber'];
        $class_name = $_POST['ClassName'];
        $sql1 = "UPDATE classes SET class_number = $class_num2,class_name = '$class_name' WHERE class_number = $class_num";
        $result2 = mysqli_query($GLOBALS['conn'], $sql1);
        header('Location:index.php');
        exit;
    }
    ?>
    <div class="container">
        <form action="#" method="POST">
            <div class="form-group">
                <label class="mb-2 mt-4 fw-bold">Class Number</label>
                <input type="number" class="form-control" value="<?php echo $row['class_number'] ?>" name="ClassNumber">
                <label class="mb-2 mt-4 fw-bold">Class Name</label>
                <input type="text" class="form-control" value="<?php echo $row['class_name'] ?>" name="ClassName">
            </div>
            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
    <?php

    ?>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
require_once '../db.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Class</title>
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
        $sql1 = "DELETE FROM classes WHERE class_number = $class_num";
        $result2 = mysqli_query($GLOBALS['conn'], $sql1);
        header('Location:index.php');
        exit;
    }
    ?>
    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label class="mb-2 mt-4 fw-bold">Class Number</label>
                <input type="number" class="form-control" readonly name="ClassNumber" value="<?php echo $row['class_number'] ?>">
                <label class="mb-2 mt-4 fw-bold">Class Name</label>
                <input type="text" class="form-control" name="ClassName" readonly value="<?php echo $row['class_name'] ?>">
            </div>
            <button type="submit" class="btn btn-danger mt-4">Delete</button>&nbsp;&nbsp;<a href="index.php" class="btn btn-dark mt-4">Back</a>
        </form>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
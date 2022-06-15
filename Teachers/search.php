<?php
require_once('../db.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search by Id or Name</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/search.css">

</head>

<body>
    <div class="container mt-3">
        <form action="#" method="post">
            <div class="form-group d-flex align-items-center form-container">
                <label style="width:210px;font-weight:bold">Search by teacher number :</label>
                <input type="number" class="form-control me-3" style="width: 250px;" name="teacherNumber">
                <label style="width:210px;font-weight:bold">Search by teacher name :</label>
                <input type="search" class="form-control me-3" style="width: 250px;" name="teacherName">
                <div>
                    <input type="submit" value="search" class="btn btn-success btn-sm">&nbsp;
                    <a class="btn btn-secondary btn-sm" href="index.php">Back</a>
                </div>
            </div>
        </form>
        <hr style="color:green">
        <table class="table mt-5">
            <thead class="text-center" style="background-color:#333;color:white">
                <td>Number</td>
                <td>Name</td>
                <td>Birth date</td>
                <td>Address</td>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['teacherNumber']) || isset($_POST['teacherName'])) {
                    if (isset($_POST['teacherNumber']) && $_POST['teacherNumber'] != NULL) {
                        $teachNum = $_POST['teacherNumber'];
                        $sql = "SELECT * FROM teachers WHERE teacher_number LIKE $teachNum";
                        if ($result = mysqli_query($GLOBALS['conn'], $sql)) {

                            while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                                <tr class="text-center">
                                    <td><?php echo $rows['teacher_number']; ?></td>
                                    <td><?php echo $rows['teacher_name']; ?></td>
                                    <td><?php echo $rows['date_birth']; ?></td>
                                    <td><?php echo $rows['teacher_address']; ?></td>
                                </tr>
                            <?php
                            }
                        }
                        exit;
                    }

                    if (isset($_POST['teacherName']) && $_POST['teacherName'] != NULL) {
                        $teachName = $_POST['teacherName'];

                        $sql2 = "SELECT * FROM teachers WHERE teacher_name LIKE '$teachName'";
                        if ($result2 = mysqli_query($GLOBALS['conn'], $sql2)) {

                            while ($rows2 = mysqli_fetch_assoc($result2)) {

                            ?>
                                <tr class="text-center">
                                    <td><?php echo $rows2['teacher_number']; ?></td>
                                    <td><?php echo $rows2['teacher_name']; ?></td>
                                    <td><?php echo $rows2['date_birth']; ?></td>
                                    <td><?php echo $rows2['teacher_address']; ?></td>
                                </tr>
                <?php
                            }
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
require_once('../db.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search by Date or Class</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/search.css">

</head>

<body>
    <div class="container mt-3">
        <form action="#" method="post">
            <div class="form-group d-flex align-items-center form-container">
                <label style="width:250px;font-weight:bold"> Serach by date between</label>
                <input type="date" class="form-control me-3" style="width: 250px;" name="FirstDate">
                <label style="width:70px;font-weight:bold">And :</label>
                <input type="date" class="form-control me-3" style="width: 250px;" name="SecondDate">
                <label style="width:155px;font-weight:bold">Or Calss name :</label>
                <input type="text" class="form-control me-3" style="width: 250px;" name="className">
                <div class="d-flex">
                    <input type="submit" value="search" class="btn btn-success btn-sm">&nbsp;
                    <a class="btn btn-secondary btn-sm" href="index.php">Back</a>
                </div>
            </div>
        </form>
        <hr style="color:green">
        <table class="table mt-3">
            <thead class="text-center" style="background-color:#333;color:white">
                <td>Number</td>
                <td>Name</td>
                <td>Birth</td>
                <td>Address</td>
                <td>Picture</td>
                <td>Class</td>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['FirstDate']) || isset($_POST['SecondDate']) || isset($POST['className'])) {
                    if ((isset($_POST['FirstDate']) && $_POST['FirstDate'] != NULL) && (isset($_POST['SecondDate']) && $_POST['SecondDate'] != NULL)) {
                        $firstDate = $_POST['FirstDate'];
                        $secondDate = $_POST['SecondDate'];
                        $sql = "SELECT * FROM students WHERE birth_date BETWEEN '$firstDate' AND '$secondDate'";
                        if ($result = mysqli_query($GLOBALS['conn'], $sql)) {

                            while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                                <tr class="text-center">
                                    <td class="pt-3"><?php echo $rows['student_number']; ?></td>
                                    <td class="pt-3"><?php echo $rows['student_name']; ?></td>
                                    <td class="pt-3"><?php echo $rows['birth_date']; ?></td>
                                    <td class="pt-3"><?php echo $rows['student_address']; ?></td>
                                    <td><img src="../assests/imgs/students/<?php echo $rows['student_picture'] ?>" width="50px" height="50px" class="rounded-circle" /></td>
                                    <td class="pt-3"><?php echo $rows['student_class']; ?></td>
                                </tr>
                            <?php
                            }
                        } else {
                            echo "Enter both dates";
                        }
                        exit;
                    }

                    if (isset($_POST['className']) && $_POST['className'] != NULL) {
                        $className = $_POST['className'];
                        $sql2 = "SELECT * FROM students WHERE student_class LIKE '%$className%'";

                        if ($result2 = mysqli_query($GLOBALS['conn'], $sql2)) {
                            while ($rows2 = mysqli_fetch_assoc($result2)) {

                            ?>
                                <tr class="text-center">
                                    <td class="pt-3"><?php echo $rows2['student_number']; ?></td>
                                    <td class="pt-3"><?php echo $rows2['student_name']; ?></td>
                                    <td class="pt-3"><?php echo $rows2['birth_date']; ?></td>
                                    <td class="pt-3"><?php echo $rows2['student_address']; ?></td>
                                    <td><img src="../assests/imgs/students/<?php echo $rows2['student_picture'] ?>" width="50px" height="50px" class="rounded-circle" /></td>
                                    <td class="pt-3"><?php echo $rows2['student_class']; ?></td>
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
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
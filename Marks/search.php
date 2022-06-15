<?php
require_once('../db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analays Data</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <form action="" method="POST" class="d-flex justify-content-between">
            <!--  -->
            <div>
                <label> Search by:</label>
                <select name="studentSelect" id="studentSelectId" class="studentSelectId pb-1 fw-bold mb-2">
                    <option value="n" selected disabled>students</option>
                    <option value="a">All</option>
                    <?php
                    $sql = "SELECT DISTINCT(student) FROM marks";

                    if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                            <option value="<?php echo $rows['student']; ?>"><?php echo $rows['student'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <!--  -->
                <select name="studentSelectAll" id="studentSelectAllId" style="display: none;" class="pb-1 fw-bold">
                    <option value="n" selected disabled>subject</option>
                    <?php
                    $sql_1 = "SELECT * FROM subjects";

                    if ($result_1 = mysqli_query($GLOBALS['conn'], $sql_1)) {
                        while ($rows_1 = mysqli_fetch_assoc($result_1)) {
                    ?>
                            <option value="<?php echo $rows_1['subject_name'] ?>"><?php echo $rows_1['subject_name'] ?></option>

                    <?php
                        }
                    }
                    ?>
                </select>
                <!--  -->
                <select name="studentSuccess" id="studentSuccess" class="pb-1 fw-bold" style="display: none;">
                    <option value="n" selected disabled>Success</option>
                    <option value="y">yes</option>
                </select>
                <!--  -->
                <input type="submit" value="send" id="btn" class="btn btn-primary btn-sm">
                <span></span>
            </div>
            <!--  -->
            <div>
                <a href="best_teacher.php" class="btn btn-primary btn-sm" style="background-color: crimson;font-size:12px;">The Best Teacher</a>
            </div>
        </form>
        <table class="table mt-3">
            <thead class="text-center" style="background-color:#333;color:white">
                <td style="font-size: 12px;">Mark Number</td>
                <td style="font-size: 12px;">Mark</td>
                <td style="font-size: 12px;">Student Name</td>
                <td style="font-size: 12px;">Subject Name</td>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['studentSelect']) && !isset($_POST['studentSelectAll'])) {
                    $studentMarks = $_POST['studentSelect'];
                    $sql2 = "SELECT * FROM marks WHERE student LIKE '$studentMarks' ";
                    if ($result2 = mysqli_query($GLOBALS['conn'], $sql2)) {
                        while ($rows2 = mysqli_fetch_assoc($result2)) {

                ?>

                            <tr class="text-center">
                                <td><?php echo $rows2['mark_number'] ?></td>
                                <td><?php echo $rows2['mark'] ?></td>
                                <td><?php echo $rows2['student'] ?></td>
                                <td><?php echo $rows2['subject_name'] ?></td>

                            </tr>
                        <?php
                        }
                    }
                } else if (isset($_POST['studentSelect']) && isset($_POST['studentSelectAll']) && !isset($_POST['studentSuccess'])) {
                    $allMarksInSubject = $_POST['studentSelectAll'];
                    $sql3 = "SELECT * FROM marks WHERE subject_name = '$allMarksInSubject'";
                    if ($result3 = mysqli_query($GLOBALS['conn'], $sql3)) {
                        while ($rows3 = mysqli_fetch_assoc($result3)) {
                        ?>
                            <tr class="text-center">
                                <td><?php echo $rows3['mark_number'] ?></td>
                                <td><?php echo $rows3['mark'] ?></td>
                                <td><?php echo $rows3['student'] ?></td>
                                <td><?php echo $rows3['subject_name'] ?></td>

                            </tr>
                        <?php
                        }
                    }
                } else if (isset($_POST['studentSelect']) && isset($_POST['studentSelectAll']) && isset($_POST['studentSuccess']) && $_POST['studentSuccess'] !== 'n') {
                    $subjectSelect = $_POST['studentSelectAll'];
                    $sql4 = "SELECT * FROM marks WHERE (mark >= 50) AND (subject_name LIKE '$subjectSelect')";
                    if ($result4 = mysqli_query($GLOBALS['conn'], $sql4)) {
                        while ($rows4 = mysqli_fetch_assoc($result4)) {
                        ?>
                            <tr class="text-center">
                                <td><?php echo $rows4['mark_number'] ?></td>
                                <td><?php echo $rows4['mark'] ?></td>
                                <td><?php echo $rows4['student'] ?></td>
                                <td><?php echo $rows4['subject_name'] ?></td>
                            </tr>
                <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
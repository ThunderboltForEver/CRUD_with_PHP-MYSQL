<?php
require_once('../db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Best Teacher</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center m-2" style="color:green">The Best Teacher</h1>
        <table class="table mt-3">
            <thead class="text-center" style="background-color:#333;color:white">
                <td>Subject Number</td>
                <td>Subject Name</td>
                <td>Teacher Name</td>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $j = 0;
                $sum = 0;
                $resultSub = 0;
                $subject_name_best = "";
                $subjectsArr = [];
                $successSubjestsArr = [];
                $sql6 = "SELECT subject_name FROM marks WHERE mark >= 50";
                $sql7 = "SELECT subject_name FROM subjects";
                if ($result6 = mysqli_query($GLOBALS['conn'], $sql6)) {
                    while ($rows6 = mysqli_fetch_assoc($result6)) {
                        $successSubjestsArr[$i] = $rows6['subject_name'];
                        $i++;
                    }
                }
                if ($result7 = mysqli_query($GLOBALS['conn'], $sql7)) {
                    while ($rows7 = mysqli_fetch_assoc($result7)) {
                        $subjectsArr[$j] = $rows7['subject_name'];
                        $j++;
                    }
                }
                foreach ($subjectsArr as $sub) {
                    foreach ($successSubjestsArr as $success) {

                        if ($success === $sub) {
                            $sum++;
                        }
                    }
                    if ($sum > $resultSub) {
                        $resultSub = $sum;
                        $subject_name_best = $sub;
                    }
                    $sum = 0;
                }
                $sql8 = "SELECT * FROM subjects WHERE subject_name LIKE '$subject_name_best' ";
                if ($result8 = mysqli_query($GLOBALS['conn'], $sql8)) {
                    while ($rows8 = mysqli_fetch_assoc($result8)) {
                ?>
                        <tr class="text-center">
                            <td><?php echo $rows8['subject_number'] ?></td>
                            <td><?php echo $rows8['subject_name'] ?></td>
                            <td><?php echo $rows8['teacher_name'] ?></td>
                        </tr>
                <?php
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
    <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
require_once('../db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students</title>
  <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="container">
    <a class="btn btn-primary mt-2 btn-sm" href="add.php">Add Student</a>&nbsp;<a href="search.php" class="btn btn-primary btn-sm mt-2" style="background-color: orange;">Search</a> &nbsp;<a class="btn btn-secondary  mt-2 btn-sm" href="../assests/pages/index.html">Back to Home</a>
    <table class="table mt-3">
      <thead class="text-center" style="background-color:#333;color:white">
        <td>Number</td>
        <td>Name</td>
        <td>Birth Date</td>
        <td>Address</td>
        <td>Picture</td>
        <td>Class</td>
        <td>Operations</td>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM students";
        if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
          while ($rows = mysqli_fetch_assoc($result)) {
        ?>
            <tr class="text-center">
              <td class="pt-3"><?php echo $rows['student_number'] ?></td>
              <td class="pt-3"><?php echo $rows['student_name'] ?></td>
              <td class="pt-3"><?php echo $rows['birth_date'] ?></td>
              <td class="pt-3"><?php echo $rows['student_address'] ?></td>
              <td><img src="../assests/imgs/students/<?php echo $rows['student_picture'] ?>" width="50px" height="50px" class="rounded-circle" /></td>
              <td class="pt-3"><?php echo $rows['student_class'] ?></td>
              <td class="pt-3"><a class="btn btn-success btn-sm" href="update.php?studentNum=<?php echo $rows['student_number']; ?>">Update</a>&nbsp;<a class="btn btn-danger btn-sm" href="details.php?studentNum=<?php echo $rows['student_number']; ?>">Delete</a></td>
            </tr>
        <?php }
        } ?>

      </tbody>
    </table>
  </div>

  <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
require_once('../db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teachers</title>
  <link rel="stylesheet" href="../assests/css/bootstrap.min.css">

</head>

<body>
  <div class="container">
    <a class="btn btn-primary mt-2 btn-sm" href="add.php">Add teacher</a>&nbsp;<a class="btn mt-2 btn-sm" href="search.php" style="background-color:orange;color:white;">search</a>&nbsp;<a class="btn btn-secondary  mt-2 btn-sm" href="../assests/pages/index.html">Back to Home</a>


    <table class="table mt-3">
      <thead class="text-center" style="background-color:#333;color:white">
        <td>Teacher number</td>
        <td>Teacher name</td>
        <td>Birth date</td>
        <td>Address</td>
        <td>Operations</td>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM teachers";
        if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
          while ($rows = mysqli_fetch_assoc(($result))) {

        ?>
            <tr class="text-center">
              <td><?php echo $rows['teacher_number']; ?></td>
              <td><?php echo $rows['teacher_name']; ?></td>
              <td><?php echo $rows['date_birth']; ?></td>
              <td><?php echo $rows['teacher_address']; ?></td>

              <td><a class="btn btn-success btn-sm" href="update.php?teacherNum=<?php echo $rows['teacher_number']; ?>">Update</a>&nbsp;<a class="btn btn-danger btn-sm" href="details.php?teacherNum=<?php echo $rows['teacher_number']; ?>">Delete</a></td>
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
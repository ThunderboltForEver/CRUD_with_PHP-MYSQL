<?php
require_once('../db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subjects</title>
  <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <a class="btn btn-primary mt-2 btn-sm" href="add.php">Add subject</a>&nbsp;<a class="btn btn-secondary  mt-2 btn-sm" href="../assests/pages/index.html">Back to Home</a>
    <table class="table mt-3">
      <thead class="text-center" style="background-color:#333;color:white">
        <td>Subject number</td>
        <td>Subject name</td>
        <td>Teacher name</td>
        <td>Operations</td>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM subjects";

        if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
          while ($rows = mysqli_fetch_assoc($result)) {
        ?>
            <tr class="text-center">
              <td><?php echo $rows['subject_number'] ?></td>
              <td><?php echo $rows['subject_name'] ?></td>
              <td><?php echo $rows['teacher_name'] ?></td>
              <td><a class="btn btn-success btn-sm" href="update.php?subjectNum=<?php echo $rows['subject_number'] ?>">Update</a>&nbsp;<a class="btn btn-danger btn-sm" href="details.php?subjectNum=<?php echo $rows['subject_number'] ?>">Delete</a></td>
            </tr>
        <?php }
        } ?>

      </tbody>
    </table>
  </div>

  <script src="../assests/js/bootstrap.bundle.min.js"></script>
</body>

</html>
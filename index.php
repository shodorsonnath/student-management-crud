<!-- database connection -->
<?php
    session_start();
    require 'dbconf.php';
    if(isset($_GET['delete'])){
        $student_id = mysqli_real_escape_string($conn, $_GET['delete']);
        $query = "DELETE FROM student_info WHERE id='$student_id' ";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            header("Location: index.php"); 
        } else {
            echo "Error!!!!" . mysqli_error($conn);
        }
    }
?>
<!-- html section -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-size: 100%">
    <div class="container mt-5">
     <div class="card w-100 text-center shadowBlue">
      <div class="card-header">
        <div class="row">
        <div class="d-flex justify-content-between align-items-center">
                <b style="font-size: 40px;">Student Details</b>
                <a href="student_create.php" class='btn btn-outline-primary btn-lg' data-toggle='tooltip' title="Create Student">Add New Student</a>
        </div>
    </form>
   </div>
   
  </div>
</div>

<div class="table-responsive text-center">
 <div class="card-body">
    <table class="table table-bordered table-sm">
      <thead>
      <tr>
       <th scope="col">ID</th>
       <th scope="col">Student Name</th>
       <th scope="col">Email</th>
       <th scope="col">Action</th>
       </tr>
       </thead>
       <tbody>
       <?php
        $query = "SELECT * FROM `student_info`";
        $query_run = mysqli_query($conn, $query);
        if(mysqli_num_rows($query_run) > 0){
            foreach($query_run as $student)
            {
                ?>
                <tr>
                    <td><?= $student['id']; ?></td>
                    <td><?= $student['name']; ?></td>
                    <td><?= $student['email']; ?></td>
                <td>
                <a href="student_view.php?id=<?= $student['id']; ?>"
                class='btn btn-outline-success btn-sm' data-toggle='tooltip' title="View More info">View</a>
                <a href="student_edit.php?id=<?= $student['id']; ?>" class='btn btn-outline-primary btn-sm' data-toggle='tooltip' title="Edit Student">Edit</a>
                <a href="index.php?delete=<?= $student['id']; ?>" class='btn btn-outline-danger btn-sm' data-toggle='tooltip' title="Delete this account">Delete</a>
                </td>
                </tr>
            <?php
            }
        }
        else
        {
            echo "<h5> No Record Found </h5>";
        }
        ?>

        </tbody>
    </table>
 </div>
</div>
</div>
</div>
    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    



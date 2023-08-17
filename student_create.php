<!-- database connection -->
<?php
    session_start();
    require 'dbconf.php';
    if($_POST && isset($_POST['saveAccount'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mid1 = mysqli_real_escape_string($conn, $_POST['mid1']);
        $mid2 = mysqli_real_escape_string($conn, $_POST['mid2']);
        $final = mysqli_real_escape_string($conn, $_POST['final']);

        $query = "INSERT INTO student_info (name, email, mid1, mid2, final) VALUES ('$name', '$email', '$mid1', '$mid2', '$final')";
    
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            header("Location: index.php");
        } else {
            echo "Error: " . mysqli_error($conn);
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
            <b style="font-size: 40px;">New Student Form</b>
        </div>
    <div class="card-body bg-gradient">
    <form method="POST">
    <table class="table">
      <tbody>
        <tr>
          <th>Student ID</th>
          <td><input type="text" name="id" class="form-control input-sm" required></td>
          <th>Student Name</th>
          <td><input type="text" name="name" class="form-control input-sm" required></td>
        </tr>
        <tr>
        <th>Student Email</th>
          <td><input type="text" name="email" class="form-control input-sm" required></td>
          <th>Midterm 1 Mark</th>
          <td><input type="text" name="mid1" class="form-control input-sm" required></td>
        </tr>
        <tr>
        <th>Midterm 2 Mark</th>
          <td><input type="text" name="mid2" class="form-control input-sm" required></td>
          <th>Final Mark</th>
          <td><input type="text" name="final" class="form-control input-sm" required></td>
        </tr>
        <tr> 
          <td colspan="4">
            <button type="submit" name="saveAccount" class="btn btn-outline-primary">Save Details</button>
            <button type="reset" class="btn btn-outline-danger">Reset</button>
          </td>
        </tr>
      </tbody>
    </table>
    </form>
  </div>
</div>
    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
session_start();
require 'dbconf.php';
if($_POST){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mid1 = mysqli_real_escape_string($conn, $_POST['mid1']);
    $mid2 = mysqli_real_escape_string($conn, $_POST['mid2']);
    $final = mysqli_real_escape_string($conn, $_POST['final']);

    $total = $mid1 + $mid2 + $final;
    $grade = "";

    if ($total >= 90) {
        $grade = "A+";
    } elseif ($total >= 87) {
        $grade = "A-";
    } elseif ($total >= 80) {
        $grade = "B+";
    } elseif ($total >= 75) {
        $grade = "B";
    } elseif ($total >= 70) {
        $grade = "B-";
    } elseif ($total >= 65) {
        $grade = "C";
    } else {
        $grade = "Fail";
    }

    $update_query = "UPDATE student_info SET name='$name', email='$email', mid1='$mid1', mid2='$mid2', final='$final', total='$total', grade='$grade' WHERE id='$id' ";
    $update_query_run = mysqli_query($conn, $update_query);

    if ($update_query_run) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $student_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM student_info WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0){
        $student = mysqli_fetch_array($query_run);
    } else {
        echo "<h4>Not found Student Details!!!</h4>";
    }
} else {
    echo "<h4>Invalid Student ID!!!</h4>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Edit</title>
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
                    <div>
                        <b style="font-size: 40px;">Edit Student Details</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive text-center">
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="id" value="<?= $student['id']; ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $student['name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Student Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $student['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="mid1" class="form-label">Midterm 1 Mark</label>
                        <input type="text" class="form-control" id="mid1" name="mid1" value="<?= $student['mid1']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="mid2" class="form-label">Midterm 2 Marks</label>
                        <input type="text" class="form-control" id="mid2" name="mid2" value="<?= $student['mid2']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="final" class="form-label">Final Marks</label>
                        <input type="text" class="form-control" id="final" name="final" value="<?= $student['final']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
     <!-- bootstrap script -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

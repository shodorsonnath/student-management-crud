<!-- database connection -->
<?php
session_start();
require 'dbconf.php';
if (isset($_GET['delete'])) {
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
    <title>Student View</title>
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
                        <b style="font-size: 40px;">Student View</b>
                    </div>
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
                            <th scope="col">Mid1</th>
                            <th scope="col">Mid2</th>
                            <th scope="col">Final</th>
                            <th scope="col">Total</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM student_info WHERE id='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                                $mid1 = $student['mid1'];
                                $mid2 = $student['mid2'];
                                $final = $student['final'];
                                $totalMarks = $mid1 + $mid2 + $final;

                                $grade = "Fail";
                                if ($totalMarks >= 90) {
                                    $grade = "A";
                                } elseif ($totalMarks >= 87) {
                                    $grade = "A-";
                                } elseif ($totalMarks >= 80) {
                                    $grade = "B+";
                                } elseif ($totalMarks >= 75) {
                                    $grade = "B";
                                } elseif ($totalMarks >= 70) {
                                    $grade = "B-";
                                } elseif ($totalMarks >= 65) {
                                    $grade = "C";
                                }

                                echo "<tr>";
                                echo "<td>{$student['id']}</td>";
                                echo "<td>{$student['name']}</td>";
                                echo "<td>{$student['email']}</td>";
                                echo "<td>{$mid1}</td>";
                                echo "<td>{$mid2}</td>";
                                echo "<td>{$final}</td>";
                                echo "<td>{$totalMarks}</td>";
                                echo "<td>{$grade}</td>";
                                echo "<td>";
                                echo "<a href='student_edit.php?id={$student['id']}' class='btn btn-outline-primary btn-sm' data-toggle='tooltip' title='Edit Student'>Edit</a>";
                                echo " "."<a href='index.php?delete={$student['id']}' class='btn btn-outline-danger btn-sm' data-toggle='tooltip' title='Delete this account'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            } else {
                                echo "<tr><td colspan='9'><h4>Student Details not found!</h4></td></tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

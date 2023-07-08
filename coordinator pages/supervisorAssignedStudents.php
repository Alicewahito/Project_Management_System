<?php
session_start();

if (!isset($_SESSION['staff_ID'])) {
    header("Location: coordinatorDashboard.php");
    exit();
}

// Get the supervisor ID from the URL parameter or any other source
$staffID = $_GET['staff_ID'];

$mysqli = require __DIR__ . "/database.php";
$query = "SELECT * FROM supervisor WHERE staff_ID = '$staffID'";
$result = mysqli_query($mysqli, $query);
$supervisor = mysqli_fetch_assoc($result);

// Check if the supervisor exists
if (!$supervisor) {
    echo "Supervisor not found";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentQuery = "UPDATE students SET staff_id = '$staffID' WHERE staff_id = '$staffID'";
    $studentResult = mysqli_query($mysqli, $studentQuery);

    if ($studentResult) {
        header("Location: coordinatorDashboard.php");
        exit();
    } else {
        echo "Failed to add student. Please try again.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/supervisorAssignedStudents.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4d187605a0.js" crossorigin="anonymous"></script>
    <title>ProjectHub | Supervisor's Students</title>
</head>
<body>
<?php
require_once "../reusables/header.php"
?>
<div class="main-container">
    <?php
    require_once "../reusables/coordinatorNavigationBar.php"
    ?>
    <div class="content">
        <div class="allocation rectangle">Assigned Students</div>
        <div class="allocationDetails rectangle">
            <div class="title"> <h2>Assigned Students</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Student
                    </button>
            </div>
            <div>
                <h2>Supervisor Details</h2>
                <p>Staff ID: <?php echo $supervisor['staff_ID']; ?></p>
                <p>Supervisor Name: <?php echo $supervisor['first_name'] . ' ' . $supervisor['last_name']; ?></p>
            </div>
            <table>
                <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Registration Number </th>
                    <th>class</th>
                </tr>
                </thead>
                <tbody>
                <?php
            $studentQuery = "SELECT * FROM students WHERE staff_id = '$staffID'";
            $studentResult = mysqli_query($mysqli, $studentQuery);

             while ($student = mysqli_fetch_assoc($studentResult)) : ?>
                <tr>
                    <td><?php echo $student['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $student['student_regNo'];  ?></td>
                    <td> <?php echo $student['class'];  ?></td>
                </tr>
                <tr>
                    <td><?php echo $student['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $student['student_regNo'];  ?></td>
                    <td> <?php echo $student['class'];  ?></td>
                </tr>
                <tr>
                    <td><?php echo $student['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $student['student_regNo'];  ?></td>
                    <td> <?php echo $student['class'];  ?></td>
                </tr>
                <tr>
                    <td><?php echo $student['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $student['student_regNo'];  ?></td>
                    <td> <?php echo $student['class'];  ?></td>
                </tr>
                <tr>
                    <td><?php echo $student['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $student['student_regNo'];  ?></td>
                    <td> <?php echo $student['class'];  ?></td>
                </tr>
                <tr>
                    <td><?php echo $student['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $student['student_regNo'];  ?></td>
                    <td> <?php echo $student['class'];  ?></td>
                </tr>
                <tr>
                    <td><?php echo $student['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $student['student_regNo'];  ?></td>
                    <td> <?php echo $student['class'];  ?></td>
                </tr>
                <tr>
                    <td><?php echo $student['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $student['student_regNo'];  ?></td>
                    <td> <?php echo $student['class'];  ?></td>
                </tr>
                <tr>
                    <td><?php echo $student['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $student['student_regNo'];  ?></td>
                    <td> <?php echo $student['class'];  ?></td>
                </tr>
                <tr>
                    <td><?php echo $student['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $student['student_regNo'];  ?></td>
                    <td> <?php echo $student['class'];  ?></td>
                </tr>
                 <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


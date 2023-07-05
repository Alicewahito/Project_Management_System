<?php
    session_start();
    if (!isset($_SESSION['student_regNo'])) {
    header("Location: loginStudent.php");
    exit();
    }

    $student_Id = $_SESSION['student_regNo'];

    $mysqli = require __DIR__ . "/database.php";

$query = "SELECT proposal.deadline, CONCAT(supervisor.first_name, ' ', supervisor.last_name) AS lecturer_name, students.project_title
          FROM proposal
          JOIN supervisor ON proposal.staff_id = supervisor.staff_ID
          JOIN students ON proposal.student_id = students.student_regNo
          WHERE proposal.student_id = '$student_Id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Error retrieving proposal details: " . mysqli_error($conn));
}

$deadline = $row['deadline'];
$lecturerName = $row['lecturer_name'];
$projectTitle = $row['project_title'];

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        // Check if a file was uploaded successfully
        if ($file['error'] === UPLOAD_ERR_OK) {
            $fileName = $file['name'];
            $fileTemp = $file['tmp_name'];
            $fileSize = $file['size'];

            // Move the uploaded file to a specific directory
            $uploadDir = 'uploads/proposal/';
            $destination = $uploadDir . $fileName;
            if (move_uploaded_file($fileTemp, $destination)) {
                echo "File uploaded successfully.<br>";
            } else {
                echo "Error uploading file.<br>";
            }
        } else {
            echo "Error uploading file: " . $file['error'] . "<br>";
        }
    }

    // Get the description from the form
    $description = $_POST['description'];

    // Store the description and file in the proposal table
    $insertQuery = "INSERT INTO proposal (student_id, description, upload_file)
                    VALUES ('$student_Id', '$description','$file', '$destination')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        echo "Proposal data stored successfully.<br>";
    } else {
        echo "Error storing proposal data: " . mysqli_error($conn) . "<br>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Proposal</title>
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/proposal.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4d187605a0.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    require_once "../reusables/header.php"
    ?>
<div class="main-container">
    <?php
    require_once "../reusables/navigationBar.php"
    ?>
    <div class="content">
        <div class="proposal rectangle">Proposal</div>
        <div class="proposalDetails rectangle">
            <h2>Proposal</h2>
            <div class="set">
                <h3>Deadline: </h3>
                <p><?php echo $deadline; ?></p>
            </div>
            <div class="set">
                <h3>Supervisor's Name: </h3>
                <p><?php echo $lecturerName; ?></p>
            </div>
            <div class="set">
                <h3>Project Title: </h3>
                <p><?php echo $projectTitle; ?></p>
            </div>
            <form action="proposal.php" method="post">
                <div class="form-row">
                    <label id="upload" for="uploadFile">Upload File:</label><input type="file" id="uploadFile" name="file">
                </div>
                <div class="form-row">
                    <label for="description" >Description:</label><input id="description" name="description">
                </div>
                <button id="submit" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
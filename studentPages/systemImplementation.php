<?php
    session_start();
    if (!isset($_SESSION['student_regNo'])) {
    header("Location: loginStudent.php");
    exit();
    }

    $student_Id = $_SESSION['student_regNo'];

    $mysqli = require __DIR__ . "/database.php";

    $query = "SELECT implementation.deadline, CONCAT(supervisor.first_name, ' ', supervisor.last_name) AS lecturer_name, students.project_title
          FROM implementation
          JOIN supervisor ON implementation.staff_id = supervisor.staff_ID
          JOIN students ON implementation.student_id = students.student_regNo
          WHERE implementation.student_id = '$student_Id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Error retrieving implementation details: " . mysqli_error($conn));
}

$deadline = $row['deadline'];
$lecturerName = $row['lecturer_name'];
$projectTitle = $row['project_title'];

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle documentation file upload
    if (isset($_FILES['documentation'])) {
        $documentationFile = $_FILES['documentation'];

        // Check if the file was uploaded successfully
        if ($documentationFile['error'] === UPLOAD_ERR_OK) {
            $documentationFileName = $documentationFile['name'];
            $documentationFileTemp = $documentationFile['tmp_name'];
            $documentationFileSize = $documentationFile['size'];

            // Move the uploaded documentation file to a specific directory
            $uploadDir = 'uploads/implementation/';
            $documentationDestination = $uploadDir . $documentationFileName;
            if (move_uploaded_file($documentationFileTemp, $documentationDestination)) {
                echo "Documentation file uploaded successfully.<br>";
            } else {
                echo "Error uploading documentation file.<br>";
            }
        } else {
            echo "Error uploading documentation file: " . $documentationFile['error'] . "<br>";
        }
    }

    // Handle zipped file upload
    if (isset($_FILES['zipped_file'])) {
        $zippedFile = $_FILES['zipped_file'];

        // Check if the file was uploaded successfully
        if ($zippedFile['error'] === UPLOAD_ERR_OK) {
            $zippedFileName = $zippedFile['name'];
            $zippedFileTemp = $zippedFile['tmp_name'];
            $zippedFileSize = $zippedFile['size'];

            // Move the uploaded zipped file to a specific directory
            $zippedDestination = $uploadDir . $zippedFileName;
            if (move_uploaded_file($zippedFileTemp, $zippedDestination)) {
                echo "Zipped file uploaded successfully.<br>";
            } else {
                echo "Error uploading zipped file.<br>";
            }
        } else {
            echo "Error uploading zipped file: " . $zippedFile['error'] . "<br>";
        }
    }

    // Get the description from the form
    $description = $_POST['description'];

    // Store the description, documentation file, and zipped file in the implementation table
    $insertQuery = "INSERT INTO implementation (student_id, description, documentation , zipped_file)
                    VALUES ('$studentId', '$description', '$documentationDestination', '$zippedDestination')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        echo "Implementation data stored successfully.<br>";
    } else {
        echo "Error storing implementation data: " . mysqli_error($conn) . "<br>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | System Implementation</title>
    <link href="../css/systemImplementation.css" rel="stylesheet">
    <?php
    require_once "../reusables/head.php"
    ?>
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
            <div class="implementation rectangle">System Implementation</div>
            <div class="implementationDetails rectangle">
                <h2>System Implementation</h2>
                <div class="set">
                    <h3>Deadline:</h3>
                    <p>12th May 2023</p>
                </div>
                <div class="set">
                    <h3>Supervisor's Name: </h3>
                    <p>Mr. AAAAAA</p>
                </div>
                <form action="systemImplementation.php" method="post">
                    <div class="form-row">
                         <label id="documentation" for="documentation">Full Documentation: </label><input class="chooseFile" type="file" id="documentationInput" name="documentation" required>
                    </div>
                    <div class="form-row">
                        <label id="upload" for="uploadFile">Zipped File: </label><input type="file" id="uploadFile" name="zipped_file">
                    </div>
                    <div class="form-row">
                        <label id="repository" for="githubRepository">Github Repository:(optional)</label><input id="githubRepository" name="githubRepository">
                    </div>
                    <div class="form-row">
                        <label for="description">Description:</label><input id="description" name="description">
                    </div>
                    <button id="submit" type="submit">Submit</button>
                 </form>
            </div>
        </div>
</body>
</html>
<?php
session_start();

if (!isset($_SESSION['staff_ID'])) {
    header("Location: ../studentPages/loginSupervisor.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the task details from the form
    $taskTitle = $_POST['task_title'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];

    $errors = [];

    if (empty($startDate)) {
        $errors[] = "Start Date is required.";
    }

    if (empty($endDate)) {
        $errors[] = "End Date is required.";
    }

    // Check if there are any errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        exit();
    }

    $mysqli = require __DIR__ . "/database.php";

    // Adjust the table names based on the tasks
    $tables = [
        'concept_paper',
        'proposal',
        'system_analysis',
        'system_design',
        'implementation'
    ];

    foreach ($tables as $table) {
        $query = "INSERT INTO $table ( start_date, deadline) VALUES ( '$startDate', '$endDate')";

        $result = mysqli_query($mysqli, $query);

        // Check if the query was successful
        if (!$result) {
            echo "Failed to save the deadline for $table. Please try again.";
            exit();
        }
    }

    header("Location: coordinatorDashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Deadlines </title>
    <link href="../css/deadlines.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
        require_once "../reusables/coordinatorNavigationBar.php"
        ?>
        <div class="content">
           <button class="add-task"><p>+ Add Task </p></button>
            <form action="deadlines.php" method="post">>
            <table>
                <tr>
                    <th>Task</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
                <tr class="task-row">
                    <td>
                        <span class="task" name="task_title">Concept Paper </span>
                    </td>
                    <td><input type="date" class="date-input start-date" name="start_date" readonly></td>
                    <td><input type="date" class="date-input end-date"  name="end_date"readonly></td>
                </tr>
                <tr class="task-row">
                    <td>
                        <span class="task" name="task_title">Proposal</span>
                    </td>
                    <td><input type="date" class="date-input start-date" name="start_date" readonly></td>
                    <td> <input type="date" class="date-input start-date" name="end_date" readonly></td>
                </tr>
                <tr class="task-row">
                    <td>
                        <span class="task"  name="task_title">System Analysis </span>
                    </td>
                    <td><input type="date" class="date-input start-date" name="start_date"readonly></td>
                    <td><input type="date" class="date-input start-date" name="end_date"readonly></td>
                </tr>
                <tr class="task-row">
                    <td>
                        <span class="task"  name="task_title">System Design</span>
                    </td>
                    <td><input type="date" class="date-input start-date" name="start_date" readonly></td>
                    <td><input type="date" class="date-input start-date"name="end_date" readonly></td>
                </tr>
                <tr class="task-row">
                    <td>
                        <span class="task"  name="task_title">Implementation</span>
                    </td>
                    <td><input type="date" class="date-input start-date" name="start_date" readonly></td>
                    <td><input type="date" class="date-input start-date" name="end_date"readonly></td>
                </tr>
                <button class="save-button" type="submit">Save</button>
            </table>
            </form>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                $(document).ready(function() {
                    $(".start-date").datepicker({
                        dateFormat: "yy-mm-dd",
                        onSelect: function(selectedDate) {
                            $(".start-date").val(selectedDate);
                        }
                    });

                    $(".end-date").datepicker({
                        dateFormat: "yy-mm-dd",
                        onSelect: function(selectedDate) {
                            $(".end-date").val(selectedDate);
                        }
                    });
                });
            </script>
        </div>
    </div>
</body>

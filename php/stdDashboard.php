<?php
session_start();
    if (isset($_SESSION['student_regNo'])){
        $student_id = $_SESSION['student_regNo'];
    }
    $mysqli = require __DIR__ . "/database.php";

        $totalTaskQuery = "SELECT  COUNT(*) AS total_tasks
        FROM concept_paper
        WHERE student_regNo = '$student_id'
        UNION
        SELECT  COUNT(*) AS total_tasks
        FROM proposal
        WHERE student_regNo = '$student_id'
        UNION
        SELECT COUNT(*) AS total_tasks
        FROM system_analysis
        WHERE student_regNo = '$student_id'
        UNION
        SELECT COUNT(*) AS total_tasks
        FROM system_design
        WHERE student_regNo = '$student_id'
        UNION
        SELECT  COUNT(*) AS total_tasks
        FROM system_implementation
        WHERE student_regNo = '$student_id'";
        $totalTasksResults = $totalTaskQuery;
        $totalTasksRow = mysqli_fetch_assoc($totalTasksResults);
        $totalTasks = $totalTasksRow['totalTasks'];

        $reviewedTasksQuery = "SELECT COUNT(*) AS reviewed_tasks
        FROM concept_paper
        WHERE student_regNo = '$student_id' AND status = 'reviewed'
        UNION
        SELECT  COUNT(*) AS reviewed_tasks
        FROM proposal
        WHERE student_regNo = '$student_id' AND status = 'reviewed'
        UNION
        SELECT  COUNT(*) AS reviewed_tasks
        FROM system_analysis
        WHERE student_regNo = '$student_id' AND status = 'reviewed'
        UNION
        SELECT  COUNT(*) AS reviewed_tasks
        FROM system_design
        WHERE student_regNo = '$student_id' AND status = 'reviewed'
        UNION
        SELECT COUNT(*) AS reviewed_tasks
        FROM system_implementation
        WHERE student_regNo ='$student_id' AND status = 'reviewed'";
        
        $reviewedTasksResult = $reviewedTasksQuery;
        $reviewedTaskRow = mysqli_fetch_assoc($reviewedTasksResult);
        $reviewedTasks = $reviewedTaskRow['reviewedTasks'];


        $pendingTasks = $totalTasks - $reviewedTasks;
    else{
    header("Location: loginStudent.php");
    exit();
    }
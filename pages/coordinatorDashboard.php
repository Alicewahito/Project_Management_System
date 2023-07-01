<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ProjectHub |Coordinator Dashboard</title>
    <link href="../css/dashboard.css" rel="stylesheet"/>
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
    <div class="tasks-container">
        <div class="dashboard rectangle">
            <h2><i class="fa-solid fa-bars"> </i> Dashboard</h2>
        </div>
        <div class="rectangle circle-box">
            <div class="circle">
                <p>10</p>
                <h3>Total Tasks</h3>
            </div>
            <div class="circle">
                <p>10</p>
                <h3>Reviewed Tasks</h3>
            </div>
            <div class="circle">
                <p>10</p>
                <h3>Pending Tasks</h3>
            </div>
        </div>
        <div class="list-container rectangle">
            <div class="row">
                <h3>Student Name</h3>
                <h3>Tasks</h3>
                <h3>status</h3>
            </div>
            <div class="row">
                <p>Ann Waithera</p>
                <p>Concept Paper</p>
                <p> Pending</p>
                <p> <a href=""> view more</a></p>
            </div>
            <div class="row">
                <p>Mark Mutiso</p>
                <p>Proposal</p>
                <p> complete</p>
                <p> <a href=""> view more</a></p>
            </div>
            <div class="row">
                <p>James Njoroge</p>
                <p>System Analysis</p>
                <p> reviewed</p>
                <p> <a href=""> view more</a></p>
            </div>
            <div class="row">
                <p>Henry Wanyoike</p>
                <p>System Design</p>
                <p> Pending</p>
                <p> <a href=""> view more</a></p>
            </div>
            <div class="row">
                <p>Faith Atieno</p>
                <p>System Implementation</p>
                <p> Pending</p>
                <p> <a href=""> view more</a></p>
        </div>
    </div>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ProjectHub | Dashboard</title>
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
        require_once "../reusables/navigationBar.php"
        ?>
        <div class="tasks-container">
            <div class="dashboard rectangle">
                <h2><i class="fa-solid fa-bars"> </i> Dashboard</h2>
            </div>
            <div class="rectangle circle-box">
                <?php include '../php/stdDashboard.php'; ?>
                <div class="circle">
                    <p> <? php echo $totalTasks; ?> </p>
                    <h3>Total Tasks</h3>
                </div>
                <div class="circle">
                    <p> <? php echo $reviewedTasks; ?> </p>
                    <h3>Reviewed Tasks</h3>
                </div>
                <div class="circle">
                    <p> <? php echo $pendingTasks; ?> </p>
                    <h3>PendingTasks</h3>
                </div>
            </div>
            <div class="list-container rectangle">
                <div class="row">
                    <h3>Tasks</h3>
                    <h3>status</h3>
                    <h3>Deadline</h3>
                </div>
                <div class="row">
                    <?php
                    $tasksQuery = "SELECT * FROM concept_paper";
                    $tasksResult = $tasksQuery;
                    while ($taskRow = mysqli_fetch_assoc($tasksResult)) {
                    $deadline = $taskRow['deadline'];
                    $status = $taskRow['status'];
                    ?>
                    <p>Concept Paper</p>
                    <p> <?php echo $status; ?></p>
                    <p><?php echo $deadline; ?></p>
                </div>
                <div class="row">
                    <?php
                    $tasksQuery = "SELECT * FROM proposal";
                    $tasksResult = $tasksQuery;
                    while ($taskRow = mysqli_fetch_assoc($tasksResult)) {
                    $deadline = $taskRow['deadline'];
                    $status = $taskRow['status'];
                    ?>
                    <p>Proposal</p>
                    <p> <?php echo $status; ?></p>
                    <p> <?php echo $deadline; ?></p>
                </div>
                <div class="row">
                    <?php
                    $tasksQuery = "SELECT * FROM system_analysis";
                    $tasksResult = $tasksQuery;
                    while ($taskRow = mysqli_fetch_assoc($tasksResult)) {
                    $deadline = $taskRow['deadline'];
                    $status = $taskRow['status'];
                    ?>
                    <p>System Analysis</p>
                    <p> <?php echo $status; ?></p>
                    <p> <?php echo $deadline; ?></p>
                </div>
                <div class="row">
                    <?php
                    $tasksQuery = "SELECT * FROM system_design";
                    $tasksResult = $tasksQuery;
                    while ($taskRow = mysqli_fetch_assoc($tasksResult)) {
                    $deadline = $taskRow['deadline'];
                    $status = $taskRow['status'];
                    ?>
                    <p>System Design</p>
                    <p> <?php echo $status; ?></p>
                    <p> <?php echo $deadline; ?></p>
                </div>
                <div class="row">
                    <?php
                    $tasksQuery = "SELECT * FROM implementation";
                    $tasksResult = $tasksQuery;
                    while ($taskRow = mysqli_fetch_assoc($tasksResult)) {
                    $deadline = $taskRow['deadline'];
                    $status = $taskRow['status'];
                    ?>
                    <p>System Implementation</p>
                    <p> <?php echo $status; ?></p>
                    <p> <?php echo $deadline; ?></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
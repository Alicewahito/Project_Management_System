<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ProjectHub | Dashboard</title>
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/dashboard.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/4d187605a0.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    require_once "../reusables/header.php"
    ?>
    <div class="container">
        <?php
        require_once "../reusables/navigationBar.php"
        ?>
        <div class="tasks-container">
            <div class="dashboard rectangle">
                <h2>Dashboard</h2>
            </div>
            <div class="rectangle circle-box">
                <div class="circle">
                    <p>Task Description 1</p>
                    <h1>Total Tasks</h1>
                </div>
                <div class="circle">
                    <p>Task Description 2</p>
                    <h1>Total Tasks</h1>
                </div>
                <div class="circle">
                    <p>Task Description 3</p>
                    <h1>Total Tasks</h1>
                </div>
            </div>
            <div class="list-container rectangle">
                <div class="row">
                    <h3>Tasks</h3>
                    <h3>status</h3>
                    <h3>Deadline</h3>
                </div>
                <div class="row">
                    <p>Concept Paper</p>
                    <p> Pending</p>
                    <p>3 March 2023</p>
                </div>
                <div class="row">
                    <p>Proposal</p>
                    <p> complete</p>
                    <p>3 March 2023</p>
                </div>
                <div class="row">
                    <p>System Analysis</p>
                    <p> reviewed</p>
                    <p>3 March 2023</p>
                </div>
                <div class="row">
                    <p>System Design</p>
                    <p> Pending</p>
                    <p>3 March 2023</p>
                </div>
                <div class="row">
                    <p>System Implementation</p>
                    <p> Pending</p>
                    <p>3 March 2023</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
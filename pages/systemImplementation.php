<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | System Implementation</title>
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/systemImplementation.css" rel="stylesheet">
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
    <div>
        <div class="implementation rectangle">System Implementation</div>
        <div class="implementationDetails rectangle">
            <h2>System Implementation</h2>
            <p>Deadline: 12th May 2023</p>
            <p>Supervisor's Name: Mr. AAAAAA</p>

        <form>
            <div class="form-row">
                <label id="documentation" for="documentation">Full Documentation</label><input class="chooseFile" type="file" id="documentationInput" name="documentation" required>
            </div>
            <div class="form-row">
                <label id="zipped" for="zippedFile">Zipped File:</label><input class="chooseFile" type="file" id="zippedFile" name="zippedFile" required>
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
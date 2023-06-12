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
    <div class="container">
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
                <form>
                    <div class="form-row">
                         <label id="documentation" for="documentation">Full Documentation: </label><input class="chooseFile" type="file" id="documentationInput" name="documentation" required>
                    </div>
                    <div class="form-row">
                        <label id="upload" for="uploadFile">Zipped File: </label><input type="file" id="uploadFile" name="uploadFile">
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
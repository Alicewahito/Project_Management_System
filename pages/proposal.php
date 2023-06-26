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
                <p>12th May 2023</p>
            </div>
            <div class="set">
                <h3>Supervisor's Name: </h3>
                <p>Mr. AAAAAA</p>
            </div>
            <div class="set">
                <h3>Project Title: </h3>
                <p>sdjhfjrhuhf system</p>
            </div>
            <form>
                <div class="form-row">
                    <label id="upload" for="uploadFile">Upload File:</label><input type="file" id="uploadFile" name="uploadFile">
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub |System Analysis</title>
    <link href="../css/main.css" rel="stylesheet"/>
  <link href="../css/systemAnalysis.css" rel="stylesheet">
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
        <div class="analysis rectangle">System Analysis</div>
        <div class="analysisDetails rectangle">
            <h2>System Analysis</h2>
            <p>Deadline: 12th May 2023</p>
            <p>Supervisor's Name: Mr. AAAAAA</p>
            <p>Project Title: sdjhfjrhuhf system</p>
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
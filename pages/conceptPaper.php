<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Concept Paper</title>
    <link href="../css/conceptPaper.css" rel="stylesheet" />
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
      <div class="conceptPaper rectangle">Concept Paper</div>
      <div class="conceptDetails rectangle">
        <h2>Concept Paper</h2>
        <div class="set">
          <h3>Deadline: </h3>
          <p>12th May 2023</p>
        </div>
        <div class="set">
          <h3>Supervisor's Name:</h3>
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
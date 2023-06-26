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
  <div class="main-container">
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
        <form>
            <div class="form-row">
                <label for="proposed_title"> Proposed Project Title:</label><input id="proposed_title" type="text" name="proposed_title">
            </div>
          <div class="form-row">
            <label for="description">Problem Description and Justification:</label><input type="text" id="description" name="description">
          </div>
            <div class="form-row">
            <label for="solution" >Proposed Solution:</label><input id="solution" name="solution">
          </div>
            <div class="form-row">
                <label for="tools" >Proposed Tools for Solution:</label><input id="tools" name="tools">
            </div>
            <button id="submit" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
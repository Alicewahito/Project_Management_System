<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Concept paper Submission</title>
    <link href="../css/main.css" rel="stylesheet"/>
  <link href="../css/conceptSubmission.css" rel="stylesheet">
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
    <div class="conceptPaper rectangle">Concept Paper</div>
    <div class="ConceptDetails rectangle">
      <h2>Concept Paper</h2>
      <p>Student Name:""</p>
      <p> Deadline: "" </p>
      <p> project title: </p>
      <form>
        <div class="form-row">
          <label for="description">Project Description:</label><input id="description" name="description">
        </div>
        <div class="form-row>
          <a href="" download>Download File</a>
        </div>
        <div class="form-row">
          <label for="remarks">Remarks:</label><input id="remarks" name="remarks">
        </div>
        <button id="submit" type="submit">Submit</button>
      </form>


</body>
</html>
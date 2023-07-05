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
    require_once "../reusables/coordinatorNavigationBar.php"
    ?>
  <div class="content">
    <div class="conceptPaper rectangle">Concept Paper</div>
    <div class="ConceptDetails rectangle">
      <h2>Submission Status</h2>
        <div class="grid-container">
            <div class="grid-item">
                <p class="odd">Student Name</p>
                <p class="even"> Due Date</p>
                <p class="odd"> proposed title: </p>
                <p class="even">Problem Description & Justification: </p>
                <p class="odd"> Proposed Solution:</p>
                <p class="even">Proposed Tools for Solution:</p>
                <p class="odd">Remarks:</p>
            </div>
            <div class="grid-item">
                <p id="stName" class="odd">Alice Wahito</p>
                <p id="dueDate" class="even"> May 31,2023 5:00pm</p>
                <p id="proposed_title" class="odd"> Tracking system</p>
                <p id="description" class="even"> djjjjjiwllllllllllllllfjjjjjjjjjjjjjjjjjjjjjjjjjfllkdkk</p>
                <p id="solution" class="odd"> askjadddddddddddddddddddddddddddddddddddddddddddddddddddddddjkj</p>
                <p  id="tools" class="even"> java , css,html </p>
                <ul id="remarks-list" class="odd">

                </ul>
            </div>
        </div>
        <button id="submit" type="submit">Submit Remarks</button>
        <button id="approve"> Approve Concept</button>
    </div>
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Implementation Submission</title>
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/proposalSubmission.css" rel="stylesheet">
</head>
<body>
<?php
require_once "../reusables/header.php"
?>
<div class="container">
    <?php
    require_once "../reusables/supervisorNavigationBar.php"
    ?>
    <div class="content">
        <div class="conceptPaper rectangle">System Implementation </div>
        <div class="ConceptDetails rectangle">
            <h2>Submission Status</h2>
            <div class="grid-container">
                <div class="grid-item">
                    <p class="odd">Student Name</p>
                    <p class="even"> Due Date</p>
                    <p class="odd"> Grading Status </p>
                    <p class="even"> Full Documentation: </p>
                    <p class="odd">Zipped File: </p>
                    <p class="even"> Github Repository:  </p>
                    <p class="odd">Remarks:</p>
                </div>
                <div class="grid-item">
                    <p id="stName" class="odd">Alice Wahito</p>
                    <p id="dueDate" class="even"> May 31,2023 5:00pm</p>
                    <p id="grading-status" class="odd"> Pending</p>
                    <p class="even"> pdf</p>
                    <p class="odd"> pdf</p>
                    <p class="even"> pdf</p>
                    <ul id="remarks-list" class="odd">

                    </ul>
                </div>
            </div>
            <button id="submit" type="submit">Submit Remarks</button>
        </div>
        <div class="grading rectangle">
            <h2> Award Marks </h2>
            <div class="grading-grid">
                <p>Student Name</p>
                <p id="submission-type">System Implementation</p>
                <input id="marks">
            </div>
            <button id="submit" type="submit">Submit Marks</button>
        </div>
    </div>
</body>


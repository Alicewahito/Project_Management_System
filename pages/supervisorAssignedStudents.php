<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/supervisorAssignedStudents.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4d187605a0.js" crossorigin="anonymous"></script>
    <title>ProjectHub | Supervisor's Students</title>
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
        <div class="allocation rectangle">Assigned Students</div>
        <div class="allocationDetails rectangle">
            <div class="title"> <h2>Assigned Students</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Student
                    </button>

            </div>
            <table>
                <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Registration Number </th>
                    <th>class</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>12345</td>
                    <td> comp science</td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>12345</td>
                    <td> </td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>12345</td>
                    <td> </td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>12345</td>
                    <td> </td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>12345</td>
                    <td> </td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>12345</td>
                    <td> </td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>12345</td>
                    <td> </td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>12345</td>
                    <td> </td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>12345</td>
                    <td></td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>12345</td>
                    <td> </td>
                </tr>

                </tbody>
            </table>


        </div>

    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


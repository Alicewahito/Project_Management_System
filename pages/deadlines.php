<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Deadlines </title>
    <link href="../css/deadlines.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
        require_once "../reusables/coordinatorNavigationBar.php"
        ?>
        <div class="content">
           <button class="add-task"><p>+ Add Task </p></button>
            <table>
                <tr>
                    <th>Task</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
                <tr class="task-row">
                    <td>
                        <span class="task">Concept Paper </span>
                    </td>
                    <td><input type="date" class="date-input start-date" readonly></td>
                    <td><input type="date" class="date-input start-date" readonly></td>
                    <td><button class="save-button">Save</button></td>
                </tr>
                <tr class="task-row">
                    <td>
                        <span class="task">Proposal</span>
                    </td>
                    <td><input type="date" class="date-input start-date" readonly></td>
                    <td> <input type="date" class="date-input start-date" readonly></td>
                    <td><button class="save-button">Save</button></td>
                </tr>
                <tr class="task-row">
                    <td>
                        <span class="task">System Analysis </span>
                    </td>
                    <td><input type="date" class="date-input start-date" readonly></td>
                    <td><input type="date" class="date-input start-date" readonly></td>
                    <td><button class="save-button">Save</button></td>
                </tr>
                <tr class="task-row">
                    <td>
                        <span class="task">System Design</span>
                    </td>
                    <td><input type="date" class="date-input start-date" readonly></td>
                    <td><input type="date" class="date-input start-date" readonly></td>
                    <td><button class="save-button">Save</button></td>
                </tr>
                <tr class="task-row">
                    <td>
                        <span class="task">Implementation</span>
                    </td>
                    <td><input type="date" class="date-input start-date" readonly></td>
                    <td><input type="date" class="date-input start-date" readonly></td>
                    <td><button class="save-button">Save</button></td>
                </tr>
            </table>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                $(document).ready(function() {
                    $(".start-date").datepicker({
                        dateFormat: "yy-mm-dd",
                        onSelect: function(selectedDate) {
                            $(".start-date").val(selectedDate);
                        }
                    });

                    $(".end-date").datepicker({
                        dateFormat: "yy-mm-dd",
                        onSelect: function(selectedDate) {
                            $(".end-date").val(selectedDate);
                        }
                    });
                });
            </script>
        </div>
    </div>
</body>

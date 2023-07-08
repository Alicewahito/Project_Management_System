<?php
session_start();

if (!isset($_SESSION['staff_ID'])) {
    header("Location: coordinatorDashboard.php");
    exit();
}

$mysqli = require __DIR__ . "/database.php";
$supervisorQuery = "SELECT * FROM supervisor";
$supervisorResult = mysqli_query($mysqli, $supervisorQuery);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $staffID = $_POST['staff_ID'];

    // Redirect to the individual supervisor page to assign students
    header("Location:supervisorAssignedStudents.php?staff_ID=$staffID");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Supervisor allocation</title>
    <link href="../css/allocation.css" rel="stylesheet">
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
        <div class="allocation rectangle">Appointments</div>
        <div class="allocationDetails rectangle">
            <h2>Student - supervisor allocation </h2>
            <table>
                <thead>
                <tr>
                    <th>Supervisor Name</th>
                    <th>Staff ID </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php while ($supervisor = mysqli_fetch_assoc($supervisorResult)): ?>
                <tr>
                    <td><?php echo $supervisor['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $supervisor['staff_ID']; ?></td>
                    <td>
                        <input type="hidden" name="staff_ID" value="<?php echo $supervisor['staff_ID']; ?>">
                        <button type="submit">assign students</button></td>
                </tr>
                <tr>
                    <td><?php echo $supervisor['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $supervisor['staff_ID']; ?></td>
                    <td>
                        <input type="hidden" name="staff_ID" value="<?php echo $supervisor['staff_ID']; ?>">
                        <button type="submit">assign students</button></td>
                </tr>
                <tr>
                    <td><?php echo $supervisor['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $supervisor['staff_ID']; ?></td>
                    <td>
                        <input type="hidden" name="staff_ID" value="<?php echo $supervisor['staff_ID']; ?>">
                        <button type="submit">assign students</button></td>
                </tr>
                <tr>
                    <td><?php echo $supervisor['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $supervisor['staff_ID']; ?></td>
                    <td>
                        <input type="hidden" name="staff_ID" value="<?php echo $supervisor['staff_ID']; ?>">
                        <button type="submit">assign students</button></td>
                </tr>
                <tr>
                    <td><?php echo $supervisor['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $supervisor['staff_ID']; ?></td>
                    <td>
                        <input type="hidden" name="staff_ID" value="<?php echo $supervisor['staff_ID']; ?>">
                        <button type="submit">assign students</button></td>
                </tr>
                <tr>
                    <td><?php echo $supervisor['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $supervisor['staff_ID']; ?></td>
                    <td>
                        <input type="hidden" name="staff_ID" value="<?php echo $supervisor['staff_ID']; ?>">
                        <button type="submit">assign students</button></td>
                </tr>
                <tr>
                    <td><?php echo $supervisor['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $supervisor['staff_ID']; ?></td>
                    <td>
                        <input type="hidden" name="staff_ID" value="<?php echo $supervisor['staff_ID']; ?>">
                        <button type="submit">assign students</button></td>
                </tr>
                <tr>
                    <td><?php echo $supervisor['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $supervisor['staff_ID']; ?></td>
                    <td>
                        <input type="hidden" name="staff_ID" value="<?php echo $supervisor['staff_ID']; ?>">
                        <button type="submit">assign students</button></td>
                </tr>
                <tr>
                    <td><?php echo $supervisor['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $supervisor['staff_ID']; ?></td>
                    <td>
                        <input type="hidden" name="staff_ID" value="<?php echo $supervisor['staff_ID']; ?>">
                        <button type="submit">assign students</button></td>
                </tr>
                <tr>
                    <td><?php echo $supervisor['first_name'] . ' ' . $supervisor['last_name']; ?></td>
                    <td><?php echo $supervisor['staff_ID']; ?></td>
                    <td>
                        <input type="hidden" name="staff_ID" value="<?php echo $supervisor['staff_ID']; ?>">
                        <button type="submit">assign students</button></td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table>


        </div>

    </div>

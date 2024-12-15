<?php
include_once("../../connect.php");
include_once("../get_data/get_data_account.php");

if(isset($_GET['appointment'])){
    $appointment = $_GET['appointment'];
}else{
    $appointment = 'P0000';
}

$sql_update_appointment_select_old = "SELECT * FROM appointment WHERE appointment_id = '$appointment'";
$result_update_appointment_select_old = $conn->query($sql_update_appointment_select_old);
$row_update_appointment_select_old = $result_update_appointment_select_old->fetch_assoc();

$old_cat = $row_update_appointment_select_old["cat_id"];
$old_appointment_date = $row_update_appointment_select_old["appointment_date"];
$old_appointment_time = $row_update_appointment_select_old["appointment_time"];
$old_appointment_people = $row_update_appointment_select_old["appointment_people"];
$old_message = $row_update_appointment_select_old["message"];


if($_POST['cat'] !== '') {
    $new_cat = $_POST['cat'];
} else {
    $new_cat = $old_cat;
}
if($_POST['date'] !== '') {
    $new_appointment_date = $_POST['date'];
} else {
    $new_appointment_date = $old_appointment_date;
}
if($_POST['time'] !== '') {
    $new_appointment_time = $_POST['time'];
} else {
    $new_appointment_time = $old_appointment_time;
}
if($_POST['people'] !== '') {
    $new_appointment_people = $_POST['people'];
} else {
    $new_appointment_people = $old_appointment_people;
}
if($_POST['message'] !== '') {
    $new_message = $_POST['message'];
} else {
    $new_message = $old_message;
}

$sql_update_appointment_execute = "UPDATE appointment SET cat_id = '$new_cat' , appointment_date = '$new_appointment_date' , appointment_time = '$new_appointment_time' , appointment_people = '$new_appointment_people' , message = '$new_message' WHERE appointment_id = '$appointment'"; 
$conn->query($sql_update_appointment_execute);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="another" content="Chew Zhen Kang (B2357)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NZ:wght@100..400&display=swap" rel="stylesheet">
    <title>Catfe</title>
    <link rel="shortcut icon" href="../../image/icon_logo.png">
    <link rel="stylesheet" href="../../stylesheet/style_all.css">
    <link rel="stylesheet" href="../../stylesheet/style_header.css">
    <link rel="stylesheet" href="../../stylesheet/style_update.css">
</head>
<body>
    <?php include("../page_all/header_page_action.php"); ?>
    <main>
        <div class="update_box_after">
            <p>Updated Appointment: <?php echo $appointment ?></p>
            <p>Updated Old Cat: <?php echo $old_cat ?></p>
            <p>Updated New Cat: <?php echo $new_cat ?></p>
            <p>Updated Old Appointment Date: <?php echo $old_appointment_date ?></p>
            <p>Updated New Appointment Date: <?php echo $new_appointment_date ?></p>
            <p>Updated Old Appointment Time: <?php echo $old_appointment_time ?></p>
            <p>Updated New Appointment Time: <?php echo $new_appointment_time ?></p>
            <p>Updated Old Appointment People Counts: <?php echo $old_appointment_people ?></p>
            <p>Updated New Appointment People Counts: <?php echo $new_appointment_people ?></p>
            <p>Updated Old Message: <?php echo $old_message ?></p>
            <p>Updated New Message: <?php echo $new_message ?></p>
            <a href="../list_appointment.php">Click here to return appointment List</a>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
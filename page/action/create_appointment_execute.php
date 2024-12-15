<?php
include_once("../../connect.php");
include_once("../get_data/get_data_account.php");

$appointment_result = $conn->query("SELECT appointment_id FROM appointment ORDER BY appointment_id DESC LIMIT 1");
$appointment_lastId = $appointment_result->fetch_assoc()['appointment_id'] ?? 'P0000';

$appointment_numericPart = (int)substr($appointment_lastId, 1);
$appointment_newNumericPart = str_pad($appointment_numericPart + 1, 4, '0', STR_PAD_LEFT);
$appointment_newId = 'P' . $appointment_newNumericPart;

$account = $_POST['account'];
$cat = $_POST['cat'];
$date = $_POST['date'];
$time = $_POST['time'];
$people = $_POST['people'];
$message = $_POST['message'];

$sql_appointment = "INSERT INTO appointment (appointment_id, account_id, appointment_date, appointment_time, message, cat_id, appointment_people) VALUES ('$appointment_newId', '$account', '$date', '$time', '$message','$cat' , '$people')";
$conn->query($sql_appointment);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NZ:wght@100..400&display=swap" rel="stylesheet">
    <title>Catfe</title>
    <link rel="shortcut icon" href="../../image/icon_logo.png">
    <link rel="stylesheet" href="../../stylesheet/style_all.css">
    <link rel="stylesheet" href="../../stylesheet/style_header.css">
    <link rel="stylesheet" href="../../stylesheet/style_create.css">
</head>
<body>
    <?php include("../page_all/header_page_action.php"); ?>
    <main>
        <div class="create_box_after">
            <div class="create_box_after_box">
                <div class="appointment">Appointment ID: <?php echo $appointment_newId ?></div>
                <div class="account">Account ID: <?php echo $account ?></div>
                <div class="cat">Cat ID: <?php echo $cat ?></div>
                <div class="date_time">Date Time: <?php echo $date ?> <?php echo $time ?></div>
                <div class="people">People Count: <?php echo $people ?></div>
                <div class="message">Message: <?php echo $message ?></div>
                <div><a href="<?php echo isset($_GET['from']) && $_GET['from'] == 'list' ? '../list_appointment.php' : '../../index.php'; ?>">Back</a></div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
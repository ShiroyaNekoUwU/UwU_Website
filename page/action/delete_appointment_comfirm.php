<?php 
include("../../connect.php");
include("../get_data/get_data_account.php");

if(isset($_GET['appointment'])){
    $appointment = $_GET['appointment'];
}else{
    $appointment = 'D0000';
}

$sql_delete_appointment = "SELECT * FROM appointment WHERE appointment_id = '$appointment'";
$result_delete_appointment = $conn->query($sql_delete_appointment);
$row_delete_appointment = $result_delete_appointment->fetch_assoc();
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
    <link rel="stylesheet" href="../../stylesheet/style_delete.css">
</head>
<body>
    <?php include("../page_all/header_page_action.php"); ?>
    <main>
        <div class="delete">
            <div class="delete_data">
                <div>
                    <h2>Appointment ID: <?php echo $row_delete_appointment['appointment_id'] ?></h2>
                </div>
                <div>
                    <h2>Account ID: <?php echo $row_delete_appointment['account_id'] ?></h2>
                </div>
                <div>
                    <h2>Cat ID: <?php echo $row_delete_appointment['cat_id'] ?></h2>
                </div>
                <div>
                    <h2>Appointment Date: <?php echo $row_delete_appointment['appointment_date'] ?></h2>
                </div>
                <div>
                    <h2>Appointment Time: <?php echo $row_delete_appointment['appointment_time'] ?></h2>
                </div>
                <div>
                    <h2>Appointment People: <?php echo $row_delete_appointment['appointment_people'] ?></h2>
                </div>
                <div>
                    <h2>Message: <?php echo $row_delete_appointment['message'] ?></h2>
                </div>
            </div>
            <div class="delete_comfirm">
                <div class="comfirm_cancle">
                    <a href="../list_appointment.php">Cancle</a>
                </div>
                <div class="comfirm_delete">
                    <a href="delete_appointment_execute.php?appointment=<?php echo $row_delete_appointment['appointment_id']; ?>">Delete</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
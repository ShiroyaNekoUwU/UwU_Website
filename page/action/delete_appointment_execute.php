<?php
include("../../connect.php");

if(isset($_GET['appointment'])){
    $appointment = $_GET['appointment'];
}else{
    $appointment = 'B0000';
}

$sql_delete_appointment_execute = "DELETE FROM appointment WHERE appointment_id = '$appointment'";
$conn->query("SET FOREIGN_KEY_CHECKS=0");
if (($conn->query($sql_delete_appointment_execute) === TRUE)) {
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Successfully deleted data!');</script>";
    echo "<script>window.location.href = '../list_appointment.php';</script>";
}else{
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Something was wrong!');</script>";
    echo "<script>window.location.href = '../list_appointment.php';</script>";
}
?>

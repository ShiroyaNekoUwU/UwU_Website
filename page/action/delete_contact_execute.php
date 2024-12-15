<?php
include("../../connect.php");

if(isset($_GET['contact'])){
    $contact = $_GET['contact'];
}else{
    $contact = 'N0000';
}

$sql_delete_contact_execute = "DELETE FROM contact WHERE contact_id = '$contact'";
$conn->query("SET FOREIGN_KEY_CHECKS=0");
if (($conn->query($sql_delete_contact_execute) === TRUE)) {
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Successfully deleted data!');</script>";
    echo "<script>window.location.href = '../list_contact.php';</script>";
}else{
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Something was wrong!');</script>";
    echo "<script>window.location.href = '../list_contact.php';</script>";
}
?>

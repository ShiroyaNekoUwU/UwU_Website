<?php
include("../../connect.php");

if(isset($_GET['photo'])){
    $photo = $_GET['photo'];
}else{
    $photo = 'B0000';
}

$sql_delete_photo_execute = "DELETE FROM photo WHERE photo_id = '$photo'";
$conn->query("SET FOREIGN_KEY_CHECKS=0");
if (($conn->query($sql_delete_photo_execute) === TRUE)) {
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Successfully deleted data!');</script>";
    echo "<script>window.location.href = '../list_photo.php';</script>";
}else{
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Something was wrong!');</script>";
    echo "<script>window.location.href = '../list_photo.php';</script>";
}
?>

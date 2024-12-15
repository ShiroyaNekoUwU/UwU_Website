<?php
include("../../connect.php");

if(isset($_GET['cat'])){
    $cat = $_GET['cat'];
}else{
    $cat = 'B0000';
}

$sql_delete_cat_execute = "DELETE FROM cat WHERE cat_id = '$cat'";
$conn->query("SET FOREIGN_KEY_CHECKS=0");
if (($conn->query($sql_delete_cat_execute) === TRUE)) {
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Successfully deleted data!');</script>";
    echo "<script>window.location.href = '../list_cat.php';</script>";
}else{
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Something was wrong!');</script>";
    echo "<script>window.location.href = '../list_cat.php';</script>";
}
?>

<?php
include("../../connect.php");

if(isset($_GET['order'])){
    $order = $_GET['order'];
}else{
    $order = 'B0000';
}

$sql_delete_order_execute = "DELETE FROM orders WHERE order_id = '$order'";
$conn->query("SET FOREIGN_KEY_CHECKS=0");
if (($conn->query($sql_delete_order_execute) === TRUE)) {
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Successfully deleted data!');</script>";
    echo "<script>window.location.href = '../list_order.php';</script>";
}else{
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Something was wrong!');</script>";
    echo "<script>window.location.href = '../list_order.php';</script>";
}
?>

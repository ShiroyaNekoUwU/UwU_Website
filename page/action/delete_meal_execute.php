<?php
include("../../connect.php");

if(isset($_GET['meal'])){
    $meal = $_GET['meal'];
}else{
    $meal = 'B0000';
}

$sql_delete_meal_execute = "DELETE FROM meal WHERE meal_id = '$meal'";
$conn->query("SET FOREIGN_KEY_CHECKS=0");
if (($conn->query($sql_delete_meal_execute) === TRUE)) {
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Successfully deleted data!');</script>";
    echo "<script>window.location.href = '../list_meal.php';</script>";
}else{
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Something was wrong!');</script>";
    echo "<script>window.location.href = '../list_meal.php';</script>";
}
?>

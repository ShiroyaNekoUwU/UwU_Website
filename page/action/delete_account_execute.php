<?php
include("../../connect.php");

if(isset($_GET['account'])){
    $account = $_GET['account'];
}else{
    $account = 'B0000';
}

$sql_delete_account_execute = "SELECT * FROM account JOIN user ON account.user_id = user.user_id WHERE account.account_id = '$account'";
$result_delete_account_execute = $conn->query($sql_delete_account_execute);
$row_delete_account_execute = $result_delete_account_execute->fetch_assoc();

$user_id = $row_delete_account_execute["user_id"];

$sql_delete_account_execute_account = "DELETE FROM account WHERE account_id = '$account'";
$sql_delete_account_execute_user = "DELETE FROM user WHERE user_id = '$user_id'";
$conn->query("SET FOREIGN_KEY_CHECKS=0");

if (($conn->query($sql_delete_account_execute_account) === TRUE) && ($conn->query($sql_delete_account_execute_user) === TRUE)) {
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Successfully deleted data!');</script>";
    echo "<script>window.location.href = '../list_account.php';</script>";
}else{
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    echo "<script>alert('Something was wrong!');</script>";
    echo "<script>window.location.href = '../list_account.php';</script>";
}
?>

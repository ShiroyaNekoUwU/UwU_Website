<?php 
include_once("../../connect.php");
//from login
if (isset($_POST["submit"])) {
    $account_id = $_POST["account_id"];
    $password = $_POST["password"];
}
//after register
if (isset($_GET["account_id"])) {
    $account_id = $_GET["account_id"];
    $password = $_GET["password"];
}
$sql_login = "SELECT * FROM account JOIN user on account.user_id = user.user_id WHERE account.account_id = '$account_id' AND account.PASSWORD = '$password'";
$result_login = $conn->query($sql_login);
$row_login = $result_login->fetch_assoc();
if ($result_login->num_rows > 0) {
    $_SESSION["account"] = $row_login["account_id"];
    $_SESSION["user"] = $row_login["user_id"];
    $_SESSION["user_name"] = $row_login["user_name"];
    $_SESSION["profile_photo"] = $row_login["profile_photo"];
    $_SESSION["group"] = $row_login["groups"];
    $_SESSION["email"] = $row_login["email"];
    $_SESSION["contact_num"] = $row_login["contact_num"];
    $_SESSION["password"] = $row_login["PASSWORD"];
    header("Location: ../profile.php");
} else {
    echo "<script>alert('Wrong username or password');</script>";
    echo "<script>window.location.href='../login.php';</script>";
    exit();
}
?>
<?php
include_once("../../connect.php");

if (isset($_POST['user_group'])) {
    if ($_POST['user_group'] == 'admin') {
        $user_group_part = 'A' ;
    } else if ($_POST['user_group'] == 'staff') {
        $user_group_part = 'S' ;
    } else {
        $user_group_part = 'C';
    }
} else {
    $user_group_part = 'C';
}

$user_result = $conn->query("SELECT user_id FROM user WHERE user_id LIKE '{$user_group_part}%' ORDER BY user_id DESC LIMIT 1");
$user_lastId = $user_result->fetch_assoc()['user_id'] ?? "{$user_group_part}0000";

$account_result = $conn->query("SELECT account_id FROM account ORDER BY account_id DESC LIMIT 1");
$account_lastId = $account_result->fetch_assoc()['account_id'] ?? 'B0000';

$photo_result = $conn->query("SELECT photo_id FROM photo ORDER BY photo_id DESC LIMIT 1");
$photo_lastId = $photo_result->fetch_assoc()['photo_id'] ?? 'P0000';


$user_numericPart = (int)substr($user_lastId, 1);
$user_newNumericPart = str_pad($user_numericPart + 1, 4, '0', STR_PAD_LEFT);
$user_newId = "$user_group_part" . $user_newNumericPart;

$account_numericPart = (int)substr($account_lastId, 1);
$account_newNumericPart = str_pad($account_numericPart + 1, 4, '0', STR_PAD_LEFT);
$account_newId = 'B' . $account_newNumericPart;

$photo_numericPart = (int)substr($photo_lastId, 1);
$photo_newNumericPart = str_pad($photo_numericPart + 1, 4, '0', STR_PAD_LEFT);
$photo_newId = 'P' . $photo_newNumericPart;


$target_folder = "../../image/";
$file_detect = 0;

if (!empty($_FILES['custom_photo_upload']['name'])) {
    $target_file = $target_folder . basename($_FILES["custom_photo_upload"]["name"] );
    if (file_exists($target_file)) {
        $file_detect = '!!! File already existed !!!';
    }
    if ($_FILES['custom_photo_upload']['size'] > 5000000 ) {
        $file_detect = "!!! File can't more than 5MB !!!";
    }
    if ($file_detect === 0) {
        $profile_photo = 'custom_profile_' . $photo_newNumericPart . '.png';
        if (move_uploaded_file($_FILES['custom_photo_upload']['tmp_name'], $target_folder . $profile_photo)) {
            $file_detect = 'File uploaded successfully!';
            $sql_upload = "INSERT INTO photo (photo_id, photo_name) VALUES ('$photo_newId','$profile_photo')";
            $conn->query($sql_upload);
        } else {
            $file_detect = '!!! Something was wrong for upload custom profile photo !!!';
            echo "<script>alert('{$file_error}');</script>";
            echo "<script>window.location.href='../register.php';</script>";
            exit();
            }
    } else {
        $file_error = $file_detect;
        echo "<script>alert('{$file_error}');</script>";
        echo "<script>window.location.href='../register.php';</script>";
        exit();
    }
} else {
    $profile_photo = $_POST['selected_photo'];
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$contact_num = $_POST['contact_num'];
$user_group = $_POST['user_group'] ?? 'customer';

$sql_user = "INSERT INTO user (user_id, user_name, contact_num, profile_photo) VALUES ('$user_newId', '$username', '$contact_num', '$profile_photo')";
$sql_account = "INSERT INTO account (account_id, user_id, email, password, groups) VALUES ('$account_newId', '$user_newId', '$email', '$password','$user_group')";
$conn->query($sql_user);
$conn->query($sql_account);
header("Location: ../register_after.php?account_id={$account_newId}&password={$password}&user_name={$username}&user_id={$user_newId}&user_group={$user_group}&profile_photo={$profile_photo}&file_detect={$file_detect}");
?>
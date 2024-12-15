<?php
include_once("../../connect.php");
include_once("../get_data/get_data_account.php");

if(isset($_GET['account'])){
    $account = $_GET['account'];
}else{
    $account = 'B0000';
}

$photo_result = $conn->query("SELECT photo_id FROM photo ORDER BY photo_id DESC LIMIT 1");
$photo_lastId = $photo_result->fetch_assoc()['photo_id'] ?? 'P0000';
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
        $new_profile_photo = 'custom_profile_' . $photo_newNumericPart . '.png';
        if (move_uploaded_file($_FILES['custom_photo_upload']['tmp_name'], $target_folder . $new_profile_photo)) {
            $file_detect = 'File uploaded successfully!';
            $sql_upload = "INSERT INTO photo (photo_id, photo_name) VALUES ('$photo_newId','$new_profile_photo')";
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
    $new_profile_photo = $_POST['selected_photo'];
}

$sql_update_account_select_old = "SELECT * FROM account JOIN user ON account.user_id = user.user_id WHERE account.account_id = '$account'";
$result_update_account_select_old = $conn->query($sql_update_account_select_old);
$row_update_account_select_old = $result_update_account_select_old->fetch_assoc();

$old_name = $row_update_account_select_old["user_name"];
$old_email = $row_update_account_select_old["email"];
$old_password = $row_update_account_select_old["PASSWORD"];
$old_contact_num = $row_update_account_select_old["contact_num"];
$old_profile_photo = $row_update_account_select_old["profile_photo"];
$old_groups = $row_update_account_select_old["groups"];


if($_POST['username'] !== '') {
    $new_name = $_POST['username'];
} else {
    $new_name = $old_name;
}
if($_POST['email'] !== '') {
    $new_email = $_POST['email'];
} else {
    $new_email = $old_email;
}
if($_POST['password'] !== '') {
    $new_password = $_POST['password'];
} else {
    $new_password = $old_password;
}
if($_POST['contact_num'] !== '') {
    $new_contact_num = $_POST['contact_num'];
} else {
    $new_contact_num = $old_contact_num;
}
$new_groups = $_POST['user_group'] ?? $old_groups;

$sql_update_account_execute = "UPDATE account JOIN user ON account.user_id = user.user_id SET account.email = '$new_email' , account.PASSWORD = '$new_password' , user.user_name = '$new_name' , user.contact_num = '$new_contact_num' , user.profile_photo = '$new_profile_photo' , account.groups = '$new_groups' WHERE account.account_id = '$account'"; 
$conn->query($sql_update_account_execute);

if ($now_account == $account) {
    session_unset();
    $_SESSION["account"] = $account;
    $_SESSION["user"] = $row_update_account_select_old["user_id"];
    $_SESSION["user_name"] = $new_name;
    $_SESSION["profile_photo"] = $new_profile_photo;
    $_SESSION["group"] = $new_groups;
    $_SESSION["email"] = $new_email;
    $_SESSION["contact_num"] = $new_contact_num;
    $_SESSION["password"] = $new_password;
}
include_once("../get_data/get_data_account.php");

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
    <link rel="stylesheet" href="../../stylesheet/style_update.css">
</head>
<body>
    <?php include("../page_all/header_page_action.php"); ?>
    <main>
        <div class="update_box_after">
            <div class="after_account">
            <p>Updated account: <?php echo $account ?></p>
            </div>
            <div class="update_box_after_box">
            <div class="after_email">
            <p>Updated Old Email: <?php echo $old_email ?></p>
            <p>Updated New Email: <?php echo $new_email ?></p>
            </div>
            <div class="after_name">
            <p>Updated Old Name: <?php echo $old_name ?></p>
            <p>Updated New Name: <?php echo $new_name ?></p>
            </div>
            <div class="after_pass">
            <p>Updated Old Password: <?php echo $old_password ?></p>
            <p>Updated New Password: <?php echo $new_password ?></p>
            </div>
            <div class="after_group">
            <p>Updated Old Group: <?php echo $old_groups ?></p>
            <p>Updated New Group: <?php echo $new_groups ?></p>
            </div>
            <div class="after_photo">
            <p>Updated Old Profile Photo: <img src='../../image/<?php echo $old_profile_photo ?>' alt="<?php echo $old_name ?>"></p>
            <p>Updated New Profile Photo: <img src='../../image/<?php echo $new_profile_photo ?>' alt="<?php echo $new_name ?>"></p>
            </div>
        </div>
        <div class="after_last">
        <a href="../profile.php">Click here to return Profile</a><br>
        <?php if ($now_user_group == 'admin') { ?>
            <a href="../list_account.php">Click here to return Account List</a>
        <?php } ?>
        </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
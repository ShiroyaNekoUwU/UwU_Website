<?php

include_once("../connect.php");
include_once("../page/get_data/get_data_account.php");
$account_id = $_GET["account_id"];
$password = $_GET["password"];
$user_name = $_GET["user_name"];
$user_id = $_GET["user_id"];
$user_group = $_GET["user_group"];
$profile_photo = $_GET["profile_photo"];
$file_detect = $_GET["file_detect"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NZ:wght@100..400&display=swap" rel="stylesheet">
    <title>Catfe</title>
    <link rel="shortcut icon" href="../image/icon_logo.png">
    <link rel="stylesheet" href="../stylesheet/style_all.css">
    <link rel="stylesheet" href="../stylesheet/style_header.css">
    <link rel="stylesheet" href="../stylesheet/style_register_after.css">
</head>
<body>
    <?php include("./page_all/header_page.php"); ?>
    <main>
        <div class="after_register">
            <div class="after_register_box">
                <div class="photo">
                    <img src="../image/<?php echo $profile_photo ?>" alt="<?php echo $user_name ?>">
                </div>
                <div class="name">Name: <?php echo $user_name ?></div>
                <div class="account_user">
                    <div class="account">Account ID: <?php echo $account_id ?></div>
                    <div class="user">User ID: <?php echo $user_id ?></div>
                </div>
                <div class="level">User Level: <?php echo $user_group ?></div>
                <div class="after_register_comfirm">
                    <div class="back"><a href="./register.php">Back To Register</a></div>
                    <div class="login"><a href="./action/login.php?account_id=<?php echo $account_id ?>&password=<?php echo $password ?>">Direct Login</a></div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../javascript/hamburger_menu.js"></script>
<script src="../javascript/profile_photo_select.js"></script>
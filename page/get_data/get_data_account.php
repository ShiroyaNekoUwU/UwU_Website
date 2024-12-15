<?php
if (isset($_SESSION["account"])) {
    $now_account = $_SESSION["account"];
    $now_user = $_SESSION["user"];
    $now_user_name = $_SESSION["user_name"];
    $now_user_profile_photo = $_SESSION["profile_photo"];
    $now_user_group = $_SESSION["group"];
    $now_user_email = $_SESSION["email"];
    $now_contact_num = $_SESSION["contact_num"];
    $now_password = $_SESSION["password"];
} else {
    $now_user_name = 'Guest';
    $now_user_profile_photo = 'icon_logo.png';
    $now_user_group = 'guest';
}
?>
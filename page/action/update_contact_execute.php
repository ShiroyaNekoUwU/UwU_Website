<?php
include_once("../../connect.php");
include_once("../get_data/get_data_account.php");

if(isset($_GET['contact'])){
    $contact = $_GET['contact'];
}else{
    $contact = 'N0000';
}

$sql_update_contact_select_old = "SELECT * FROM contact WHERE contact_id = '$contact'";
$result_update_contact_select_old = $conn->query($sql_update_contact_select_old);
$row_update_contact_select_old = $result_update_contact_select_old->fetch_assoc();

$old_company = $row_update_contact_select_old["company"];
$old_name = $row_update_contact_select_old["contact_name"];
$old_num = $row_update_contact_select_old["contact_num"];
$old_email = $row_update_contact_select_old["email"];
$old_message = $row_update_contact_select_old["message"];

if($_POST['company'] !== '') {
    $new_company = $_POST['company'];
} else {
    $new_company = $old_company;
}
if($_POST['name'] !== '') {
    $new_name = $_POST['name'];
} else {
    $new_name = $old_name;
}
if($_POST['number'] !== '') {
    $new_num = $_POST['number'];
} else {
    $new_num = $old_num;
}
if($_POST['email'] !== '') {
    $new_email = $_POST['email'];
} else {
    $new_email = $old_email;
}
if($_POST['message'] !== '') {
    $new_message = $_POST['message'];
} else {
    $new_message = $old_message;
}

$sql_update_contact_execute = "UPDATE contact SET company = '$new_company' , contact_name = '$new_name' , contact_name = '$new_name' , contact_num = '$new_num' , email = '$new_email' , message = '$new_message' WHERE contact_id = '$contact'"; 
$conn->query($sql_update_contact_execute);

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
            <p>Updated contact: <?php echo $contact ?></p>
            <p>Updated Old Company: <?php echo $old_company ?></p>
            <p>Updated New Company: <?php echo $new_company ?></p>
            <p>Updated Old Contact Name: <?php echo $old_name ?></p>
            <p>Updated New Contact Name: <?php echo $new_name ?></p>
            <p>Updated Old Contact Number: <?php echo $old_num ?></p>
            <p>Updated New Contact Number: <?php echo $new_num ?></p>
            <p>Updated Old Email: <?php echo $old_email ?></p>
            <p>Updated New Email: <?php echo $new_email ?></p>
            <p>Updated Old Message: <?php echo $old_message ?></p>
            <p>Updated New Message: <?php echo $new_message ?></p>
            <a href="../list_contact.php">Click here to return contact List</a>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
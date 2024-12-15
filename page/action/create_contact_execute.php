<?php
include_once("../../connect.php");
include_once("../get_data/get_data_account.php");

$contact_result = $conn->query("SELECT contact_id FROM contact ORDER BY contact_id DESC LIMIT 1");
$contact_lastId = $contact_result->fetch_assoc()['contact_id'] ?? 'N0000';

$contact_numericPart = (int)substr($contact_lastId, 1);
$contact_newNumericPart = str_pad($contact_numericPart + 1, 4, '0', STR_PAD_LEFT);
$contact_newId = 'N' . $contact_newNumericPart;

$company = $_POST['company'];
$name = $_POST['name'];
$num = $_POST['num'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql_contact = "INSERT INTO contact (contact_id, company, contact_name, contact_num, email, message) VALUES ('$contact_newId', '$company', '$name', '$num', '$email','$message')";
$conn->query($sql_contact);

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
    <link rel="shortcut icon" href="../../image/icon_logo.png">
    <link rel="stylesheet" href="../../stylesheet/style_all.css">
    <link rel="stylesheet" href="../../stylesheet/style_header.css">
    <link rel="stylesheet" href="../../stylesheet/style_create.css">
</head>
<body>
    <?php include("../page_all/header_page_action.php"); ?>
    <main>
    <div class="create_box_after">
    <div class="create_box_after_box">
                <div class="contact">Company: <?php echo $company ?></div>
                <div class="account">Name: <?php echo $name ?></div>
                <div class="meal">Contact Number: <?php echo $num ?></div>
                <div class="date_time">Contact Email<?php echo $email ?></div>
                <div class="people">Message: <?php echo $message ?></div>
                <div><a href="<?php echo isset($_GET['from']) && $_GET['from'] == 'list' ? '../list_contact.php' : '../../index.php'; ?>">Back</a></div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
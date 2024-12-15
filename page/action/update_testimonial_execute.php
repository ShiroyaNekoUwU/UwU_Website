<?php
include_once("../../connect.php");
include_once("../get_data/get_data_account.php");

if(isset($_GET['testimonial'])){
    $testimonial = $_GET['testimonial'];
}else{
    $testimonial = 'T0000';
}

$sql_update_testimonial_select_old = "SELECT * FROM testimonial WHERE testimonial_id = '$testimonial'";
$result_update_testimonial_select_old = $conn->query($sql_update_testimonial_select_old);
$row_update_testimonial_select_old = $result_update_testimonial_select_old->fetch_assoc();

$old_meal = $row_update_testimonial_select_old["meal_id"];
$old_cat = $row_update_testimonial_select_old["cat_id"];
$old_account = $row_update_testimonial_select_old["account_id"];
$old_testimonial_date = $row_update_testimonial_select_old["testimonial_date"];
$old_rate = $row_update_testimonial_select_old["rate"];
$old_message = $row_update_testimonial_select_old["message"];


if($_POST['meal'] !== '') {
    $new_meal = $_POST['meal'];
} else {
    $new_meal = $old_meal;
}
if($_POST['cat'] !== '') {
    $new_cat = $_POST['cat'];
} else {
    $new_cat = $old_cat;
}
if($_POST['account'] !== '') {
    $new_account = $_POST['account'];
} else {
    $new_account = $old_account;
}
if($_POST['date'] !== '') {
    $new_testimonial_date = $_POST['date'];
} else {
    $new_testimonial_date = $old_testimonial_date;
}
if($_POST['rate'] !== '') {
    $new_rate = $_POST['rate'];
} else {
    $new_rate = $old_rate;
}
if($_POST['message'] !== '') {
    $new_message = $_POST['message'];
} else {
    $new_message = $old_message;
}

$sql_update_testimonial_execute = "UPDATE testimonial SET meal_id = '$new_meal' , cat_id = '$new_cat' , account_id = '$new_account' , testimonial_date = '$new_testimonial_date' , rate = '$new_rate' , message = '$new_message' WHERE testimonial_id = '$testimonial'"; 
$conn->query($sql_update_testimonial_execute);

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
            <p>Updated testimonial: <?php echo $testimonial ?></p>
            <p>Updated Old Meal: <?php echo $old_meal ?></p>
            <p>Updated New Meal: <?php echo $new_meal ?></p>
            <p>Updated Old Cat: <?php echo $old_cat ?></p>
            <p>Updated New Cat: <?php echo $new_cat ?></p>
            <p>Updated Old Account: <?php echo $old_account ?></p>
            <p>Updated New Account: <?php echo $new_account ?></p>
            <p>Updated Old Rate: <?php $old_rate_num = max(0 , min($old_rate, 5)); echo (str_repeat("★", $old_rate_num) . str_repeat("☆", 5 - $old_rate_num)) ?></p>
            <p>Updated New Rate: <?php $new_rate_num = max(0 , min($new_rate, 5)); echo (str_repeat("★", $new_rate_num) . str_repeat("☆", 5 - $new_rate_num)) ?></p>
            <p>Updated Old Message: <?php echo $old_message ?></p>
            <p>Updated New Message: <?php echo $new_message ?></p>
            <a href="../list_testimonial.php">Click here to return testimonial List</a>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
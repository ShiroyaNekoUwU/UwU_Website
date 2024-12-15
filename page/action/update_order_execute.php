<?php
include_once("../../connect.php");
include_once("../get_data/get_data_account.php");

if(isset($_GET['order'])){
    $order = $_GET['order'];
}else{
    $order = 'D0000';
}

$sql_update_order_select_old = "SELECT * FROM orders WHERE order_id = '$order'";
$result_update_order_select_old = $conn->query($sql_update_order_select_old);
$row_update_order_select_old = $result_update_order_select_old->fetch_assoc();

$old_meal = $row_update_order_select_old["meal_id"];
$old_order_date = $row_update_order_select_old["order_date"];
$old_order_time = $row_update_order_select_old["order_time"];
$old_state = $row_update_order_select_old["state"];
$old_message = $row_update_order_select_old["message"];


if($_POST['meal'] !== '') {
    $new_meal = $_POST['meal'];
} else {
    $new_meal = $old_meal;
}
if($_POST['date'] !== '') {
    $new_order_date = $_POST['date'];
} else {
    $new_order_date = $old_order_date;
}
if($_POST['time'] !== '') {
    $new_order_time = $_POST['time'];
} else {
    $new_order_time = $old_order_time;
}
if($_POST['state'] !== '') {
    $new_state = $_POST['state'];
} else {
    $new_state = $old_state;
}
if($_POST['message'] !== '') {
    $new_message = $_POST['message'];
} else {
    $new_message = $old_message;
}

$sql_update_order_execute = "UPDATE orders SET meal_id = '$new_meal' , order_date = '$new_order_date' , order_time = '$new_order_time' , state = '$new_state' , message = '$new_message' WHERE order_id = '$order'"; 
$conn->query($sql_update_order_execute);

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
            <div class="after_order">
            <p>Updated Order: <?php echo $order ?></p>
            </div>
            <div class="update_box_after_box">
            <div class="after_meal">
            <p>Updated Old Meal: <?php echo $old_meal ?></p>
            <p>Updated New Meal: <?php echo $new_meal ?></p>
            </div>
            <div class="after_meal">
            <p>Updated Old Order Date: <?php echo $old_order_date ?></p>
            <p>Updated New Order Date: <?php echo $new_order_date ?></p>
            </div>
            <div class="after_meal">
            <p>Updated Old Order Time: <?php echo $old_order_time ?></p>
            <p>Updated New Order Time: <?php echo $new_order_time ?></p>
            </div>
            <div class="after_meal">
            <p>Updated Old State: <?php echo $old_state ?></p>
            <p>Updated New State: <?php echo $new_state ?></p>
            </div>
            <div class="after_meal">
            <p>Updated Old Message: <?php echo $old_message ?></p>
            <p>Updated New Message: <?php echo $new_message ?></p>
            </div>
            </div>
            <div class="after_last">
            <a href="../list_order.php">Click here to return order List</a>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
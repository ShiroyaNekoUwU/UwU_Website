<?php
include_once("../../connect.php");
include_once("../get_data/get_data_account.php");

$order_result = $conn->query("SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1");
$order_lastId = $order_result->fetch_assoc()['order_id'] ?? 'O0000';

$order_numericPart = (int)substr($order_lastId, 1);
$order_newNumericPart = str_pad($order_numericPart + 1, 4, '0', STR_PAD_LEFT);
$order_newId = 'O' . $order_newNumericPart;

$account = $_POST['account'];
$meal = $_POST['meal'];
$date = $_POST['date'];
$time = $_POST['time'];
$message = $_POST['message'];
$state = "processing";

$sql_order = "INSERT INTO orders (order_id, account_id, order_date, order_time, message, meal_id, state) VALUES ('$order_newId', '$account', '$date', '$time', '$message','$meal' , '$state')";
$conn->query($sql_order);

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
                <div class="order">Order ID: <?php echo $order_newId ?></div>
                <div class="account">Account ID: <?php echo $account ?></div>
                <div class="meal">Meal: <?php echo $meal ?></div>
                <div class="date_time">Date Time: <?php echo $date ?> <?php echo $time ?></div>
                <div class="message">Message: <?php echo $message ?></div>
                <div><a href="<?php echo isset($_GET['from']) && $_GET['from'] == 'list' ? '../list_order.php' : '../../index.php'; ?>">Back</a></div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
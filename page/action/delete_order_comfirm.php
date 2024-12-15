<?php 
include("../../connect.php");
include("../get_data/get_data_account.php");

if(isset($_GET['order'])){
    $order = $_GET['order'];
}else{
    $order = 'D0000';
}

$sql_delete_order = "SELECT * FROM orders WHERE order_id = '$order'";
$result_delete_order = $conn->query($sql_delete_order);
$row_delete_order = $result_delete_order->fetch_assoc();
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
    <link rel="stylesheet" href="../../stylesheet/style_delete.css">
</head>
<body>
    <?php include("../page_all/header_page_action.php"); ?>
    <main>
        <div class="delete">
            <div class="delete_data">
                <div>
                    <h2>Order ID: <?php echo $row_delete_order['order_id'] ?></h2>
                </div>
                <div>
                    <h2>Account ID: <?php echo $row_delete_order['account_id'] ?></h2>
                </div>
                <div>
                    <h2>Meal ID: <?php echo $row_delete_order['meal_id'] ?></h2>
                </div>
                <div>
                    <h2>Order Date: <?php echo $row_delete_order['order_date'] ?></h2>
                </div>
                <div>
                    <h2>Order Time: <?php echo $row_delete_order['order_time'] ?></h2>
                </div>
                <div>
                    <h2>Order State: <?php echo $row_delete_order['state'] ?></h2>
                </div>
            </div>
            <div class="delete_comfirm">
                <div class="comfirm_cancle">
                    <a href="../list_order.php">Cancle</a>
                </div>
                <div class="comfirm_delete">
                    <a href="delete_order_execute.php?order=<?php echo $row_delete_order['order_id']; ?>">Delete</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
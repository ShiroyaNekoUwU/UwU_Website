<?php
include("../connect.php");
include("./get_data/get_data_account.php");

$sql_list_order = "SELECT * FROM orders";
$result_list_order = $conn->query($sql_list_order);
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
    <link rel="stylesheet" href="../stylesheet/style_list_order.css">
</head>
<body>
    <?php include('./page_all/header_page.php'); ?>
    <main>
        <div class="list_order">
            <fieldset>
                <legend>Order List</legend>
                <div class="list_order_table">
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Account ID</th>
                                <th>Meal ID</th>
                                <th>Order Date</th>
                                <th>Order Time</th>
                                <th>Message</th>
                                <th>State</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php if ($result_list_order->num_rows > 0) {
                            while ($row_list_order = $result_list_order->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_list_order['order_id'] ?></td>
                                <td><?php echo $row_list_order['account_id'] ?></td>
                                <td><?php echo $row_list_order['meal_id'] ?></td>
                                <td><?php echo $row_list_order['order_date'] ?></td>
                                <td><?php echo $row_list_order['order_time'] ?></td>
                                <td><?php echo $row_list_order['message'] ?></td>
                                <td><?php echo $row_list_order['state'] ?></td>
                                <td class="update"><a href="./action/update_order_comfirm.php?order=<?php echo $row_list_order['order_id']; ?>">Update</a></td>
                                <td class="delete"><a href="./action/delete_order_comfirm.php?order=<?php echo $row_list_order['order_id']; ?>">Delete</a></td>
                            </tr>
                        <?php }} else { ?>
                            <tr>
                                <td colspan="9">Not Data Found</td>
                            </tr>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="9" class="add"><a href="./action/create_order_comfirm.php?from=list">Add more Order +</a></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </fieldset>
        </div>
    </main>
</body>
</html>
<script src="../javascript/hamburger_menu.js"></script>
<?php
include("../../connect.php");
include("../get_data/get_data_account.php");
include("../get_data/get_data_account_id.php");
include("../get_data/get_data_meal_id.php");
include("../get_data/get_data_photo.php");

if(isset($_GET['order'])){
    $order = $_GET['order'];
}else{
    $order = 'D0000';
}

$sql_update_order = "SELECT * FROM orders WHERE order_id = '$order'";
$result_update_order = $conn->query($sql_update_order);
$row_update_order = $result_update_order->fetch_assoc();

$old_meal = $row_update_order["meal_id"];
$old_order_date = $row_update_order["order_date"];
$old_order_time = $row_update_order["order_time"];
$old_message = $row_update_order["message"];
$old_state = $row_update_order["state"];


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
        <fieldset class="update_box">
            <legend>Update > <?php echo $_GET['order'] ?></legend>
            <form action="update_order_execute.php?order=<?php echo $_GET['order']; ?>" method="post">
                        <div class="field meal">
                            <label for="meal">Meal:</label><br>
                            <select name="meal" id="meal">
                                <option value="-">-</option>
                                <?php if ($result_meal_id_check->num_rows > 0) {
                                while ($row_meal_id_check = $result_meal_id_check->fetch_assoc()) { ?>
                                    <option value="<?php echo $row_meal_id_check['meal_id']; ?>" <?php if ($row_meal_id_check['meal_id'] == $old_meal) {echo 'selected';} ?>>
                                        <?php echo $row_meal_id_check['meal_id']; ?> <?php echo $row_meal_id_check['meal_name']; ?>
                                    </option>
                                <?php }} ?>
                            </select>
                        </div>
                <div class="field">
                    <label for="date">Order Date:</label><br>
                    <input type="date" id="date" name="date" value="<?php echo $old_order_date ?>">
                </div>
                <div class="field">
                    <label for="time">Order Time:</label><br>
                    <input type="time" id="time" name="time" value="<?php echo $old_order_time ?>">
                </div>
                <div class="field">
                    <label for="state">Order State:</label><br>
                    <input type="text" id="state" name="state" placeholder="<?php echo $old_state ?>">
                </div>
                <div class="field">
                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" placeholder="<?php echo $old_message ?>" rows="4" cols="50"></textarea>
                </div>
                <div class="cancle">
                    <a href="../list_order.php">Cancle</a>
                </div>
                <div class="reset">
                    <input type="reset" name="reset" value="Reset">
                </div>
                <div class="submit">
                    <input type="submit" name="submit" value="Update">
                </div>
            </form>
        </fieldset>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
<script src="../../javascript/profile_photo_select.js"></script>
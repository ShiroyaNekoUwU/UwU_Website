<?php

include_once("../../connect.php");
include_once("../get_data/get_data_account.php");
include_once("../get_data/get_data_account_id.php");
include_once("../get_data/get_data_meal_id.php");
include_once("../get_data/get_data_cat_id.php");

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
        <div class="create_box">
            <fieldset>
                <legend>testimonial</legend>
                <form action="./create_testimonial_execute.php<?php echo isset($_GET['from']) ? '?from=' . $_GET['from'] : ''; ?>" method="post">
                        <div class="field account">
                            <label for="account">Account ID:</label>
                            <?php if ($now_user_group == 'admin') { ?>
                                <select name="account" id="account">
                                    <?php if ($result_account_id_check->num_rows > 0) {
                                    while ($row_account_id_check = $result_account_id_check->fetch_assoc()) { ?>
                                        <option value="<?php echo $row_account_id_check['account_id']; ?>" <?php if ($row_account_id_check['account_id'] == $now_account) {echo 'selected';} ?>>
                                            <?php echo $row_account_id_check['account_id']; ?> <?php echo $row_account_id_check['user_name']; ?>
                                        </option>
                                    <?php }} ?>
                                </select>
                            <?php } else { ?>
                                <input type="text" name="account" id="account" value="<?php echo $now_account ?>" readonly>
                            <?php } ?>
                        </div>
                        <div class="field cat">
                            <label for="cat">Cat:</label>
                            <select name="cat" id="cat">
                                <option value="-">-</option>
                                <?php if ($result_cat_id_check->num_rows > 0) {
                                while ($row_cat_id_check = $result_cat_id_check->fetch_assoc()) { ?>
                                    <option value="<?php echo $row_cat_id_check['cat_id']; ?>">
                                        <?php echo $row_cat_id_check['cat_id']; ?> <?php echo $row_cat_id_check['cat_name']; ?>
                                    </option>
                                <?php }} ?>
                            </select>
                        </div>
                        <div class="field meal">
                            <label for="meal">Meal:</label>
                            <select name="meal" id="meal">
                            <option value="-">-</option>
                                <?php if ($result_meal_id_check->num_rows > 0) {
                                while ($row_meal_id_check = $result_meal_id_check->fetch_assoc()) { ?>
                                    <option value="<?php echo $row_meal_id_check['meal_id']; ?>">
                                        <?php echo $row_meal_id_check['meal_id']; ?> <?php echo $row_meal_id_check['meal_name']; ?>
                                    </option>
                                <?php }} ?>
                            </select>
                        </div>
                        <div class="field">
                            <label for="date">Testimonial Date:</label><br>
                            <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                        </div>
                        <div class="field">
                            <label for="message">Message:</label><br>
                            <textarea id="message" name="message" placeholder="Enter message" rows="6" cols="35"></textarea>
                        </div>
                        <div class="field">
                            <label for="rate">Rate:</label><br>
                            <input type="number" id="rate" name="rate" min="0" max="5" value="5">
                        </div>
                        <div class="field cancle">
                            <a href="<?php echo isset($_GET['from']) && $_GET['from'] == 'list' ? '../list_testimonial.php' : '../testimonial.php'; ?>">Cancle</a>
                        </div>
                        <div class="field reset">
                            <input type="reset" name="reset" value="Reset">
                        </div>
                        <div class="field submit">
                            <input type="submit" name="submit" value="Submit">
                        </div>
                </form>
            </fieldset>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
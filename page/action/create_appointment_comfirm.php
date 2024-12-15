<?php

include_once("../../connect.php");
include_once("../get_data/get_data_account.php");
include_once("../get_data/get_data_account_id.php");
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
        <div>
            <fieldset class="create_box">
                <legend>Appointment</legend>
                <form action="./create_appointment_execute.php" method="post" enctype="multipart/form-data">
                        <div class="field account">
                            <label for="account">Account ID:</label><br>
                            <?php if (in_array($now_user_group,['staff','admin'])) { ?>
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
                                <option value="-" selected>-</option>
                                <?php if ($result_cat_id_check->num_rows > 0) {
                                while ($row_cat_id_check = $result_cat_id_check->fetch_assoc()) { ?>
                                    <option value="<?php echo $row_cat_id_check['cat_id']; ?>">
                                        <?php echo $row_cat_id_check['cat_id']; ?> <?php echo $row_cat_id_check['cat_name']; ?>
                                    </option>
                                <?php }} ?>
                            </select>
                        </div>
                        <div class="field">
                            <label for="date">Appointment Date:</label><br>
                            <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="field">
                            <label for="time">Appointment Time:</label><br>
                            <input type="time" id="time" name="time" value="<?php echo date('H:i'); ?>">
                        </div>
                        <div class="field">
                            <label for="people">Appointment People Count:</label><br>
                            <input type="number" id="people" name="people" value="1" min="1">
                        </div>
                        <div class="field">
                            <label for="message">Message:</label><br>
                            <textarea id="message" name="message" placeholder="Enter message" rows="4" cols="50"></textarea>
                        </div>
                        <div class="field cancle">
                            <a href="<?php echo isset($_GET['from']) && $_GET['from'] == 'list' ? '../list_appointment.php' : '../../index.php'; ?>">Cancle</a>
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
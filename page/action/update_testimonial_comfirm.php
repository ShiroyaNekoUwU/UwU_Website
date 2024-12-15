<?php
include("../../connect.php");
include("../get_data/get_data_account.php");
include("../get_data/get_data_account_id.php");
include("../get_data/get_data_cat_id.php");
include("../get_data/get_data_meal_id.php");
include("../get_data/get_data_photo.php");

if(isset($_GET['testimonial'])){
    $testimonial = $_GET['testimonial'];
}else{
    $testimonial = 'T0000';
}

$sql_update_testimonial = "SELECT * FROM testimonial WHERE testimonial_id = '$testimonial'";
$result_update_testimonial = $conn->query($sql_update_testimonial);
$row_update_testimonial = $result_update_testimonial->fetch_assoc();

$old_cat = $row_update_testimonial["cat_id"];
$old_meal = $row_update_testimonial["meal_id"];
$old_account = $row_update_testimonial["account_id"];
$old_testimonial_date = $row_update_testimonial["testimonial_date"];
$old_message = $row_update_testimonial["message"];
$old_rate = $row_update_testimonial["rate"];


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
            <legend>Update > <?php echo $_GET['testimonial'] ?></legend>
            <form action="update_testimonial_execute.php?testimonial=<?php echo $_GET['testimonial']; ?>" method="post">
                <div class="field account">
                    <label for="account">Account ID:</label><br>
                    <select name="account" id="account">
                        <?php if ($result_account_id_check->num_rows > 0) {
                        while ($row_account_id_check = $result_account_id_check->fetch_assoc()) { ?>
                            <option value="<?php echo $row_account_id_check['account_id']; ?>" <?php if ($row_account_id_check['account_id'] == $old_account) {echo 'selected';} ?>>
                                <?php echo $row_account_id_check['account_id']; ?> <?php echo $row_account_id_check['user_name']; ?>
                            </option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="field cat">
                    <label for="cat">Cat:</label><br>
                    <select name="cat" id="cat">
                        <option value="-">-</option>
                        <?php if ($result_cat_id_check->num_rows > 0) {
                        while ($row_cat_id_check = $result_cat_id_check->fetch_assoc()) { ?>
                            <option value="<?php echo $row_cat_id_check['cat_id']; ?>" <?php if ($row_cat_id_check['cat_id'] == $old_cat) {echo 'selected';} ?>>
                                <?php echo $row_cat_id_check['cat_id']; ?> <?php echo $row_cat_id_check['cat_name']; ?>
                            </option>
                        <?php }} ?>
                    </select>
                </div>
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
                    <label for="date">Testimonial Date:</label><br>
                    <input type="date" id="date" name="date" value="<?php echo $old_testimonial_date ?>">
                </div>
                <div class="field">
                    <label for="rate">Testimonial Rate:</label><br>
                    <input type="number" id="rate" name="rate" placeholder="<?php echo $old_rate ?>" min="0" max="5">
                </div>
                <div class="field">
                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" placeholder="<?php echo $old_message ?>" rows="4" cols="50"></textarea>
                </div>
                <div class="cancle">
                    <a href="../list_testimonial.php">Cancle</a>
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
<?php
include_once("../../connect.php");
include_once("../get_data/get_data_account.php");

$testimonial_result = $conn->query("SELECT testimonial_id FROM testimonial ORDER BY testimonial_id DESC LIMIT 1");
$testimonial_lastId = $testimonial_result->fetch_assoc()['testimonial_id'] ?? 'T0000';

$testimonial_numericPart = (int)substr($testimonial_lastId, 1);
$testimonial_newNumericPart = str_pad($testimonial_numericPart + 1, 4, '0', STR_PAD_LEFT);
$testimonial_newId = 'T' . $testimonial_newNumericPart;

$account = $_POST['account'];
$cat = $_POST['cat'];
$meal = $_POST['meal'];
$date = $_POST['date'];
$rate = $_POST['rate'];
$message = $_POST['message'];

$sql_testimonial = "INSERT INTO testimonial (testimonial_id, account_id, cat_id, meal_id, testimonial_date, message, rate) VALUES ('$testimonial_newId', '$account', '$cat', '$meal', '$date', '$message','$rate')";
$conn->query("SET FOREIGN_KEY_CHECKS=0");
$conn->query($sql_testimonial);
$conn->query("SET FOREIGN_KEY_CHECKS=1");

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
                <div class="testimonial">Testimonial ID: <?php echo $testimonial_newId ?></div>
                <div class="account">Account ID: <?php echo $account ?></div>
                <div class="meal">Meal ID: <?php echo $meal ?></div>
                <div class="cat">Cat ID: <?php echo $cat ?></div>
                <div class="date">Date: <?php echo $date ?></div>
                <div class="rate">Rate: <?php echo (str_repeat("★", $rate) . str_repeat("☆", 5 - $rate)) ?></div>
                <div class="message">Message: <?php echo $message ?></div>
                <div><a href="<?php echo isset($_GET['from']) && $_GET['from'] == 'list' ? '../list_testimonial.php' : '../testimonial.php'; ?>">Back</a></div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
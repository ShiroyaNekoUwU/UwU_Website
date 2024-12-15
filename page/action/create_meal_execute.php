<?php
include_once("../../connect.php");
include_once("../get_data/get_data_account.php");

$meal_result = $conn->query("SELECT meal_id FROM meal ORDER BY meal_id DESC LIMIT 1");
$meal_lastId = $meal_result->fetch_assoc()['meal_id'] ?? 'M0000';
$meal_numericPart = (int)substr($meal_lastId, 1);
$meal_newNumericPart = str_pad($meal_numericPart + 1, 4, '0', STR_PAD_LEFT);
$meal_newId = 'M' . $meal_newNumericPart;

$photo_result = $conn->query("SELECT photo_id FROM photo ORDER BY photo_id DESC LIMIT 1");
$photo_lastId = $photo_result->fetch_assoc()['photo_id'] ?? 'P0000';
$photo_numericPart = (int)substr($photo_lastId, 1);
$photo_newNumericPart = str_pad($photo_numericPart + 1, 4, '0', STR_PAD_LEFT);
$photo_newId = 'P' . $photo_newNumericPart;

$target_folder = "../../image/";
$file_detect = 0;

if (!empty($_FILES['custom_photo_upload']['name'])) {
    $target_file = $target_folder . basename($_FILES["custom_photo_upload"]["name"] );
    if (file_exists($target_file)) {
        $file_detect = '!!! File already existed !!!';
    }
    if ($_FILES['custom_photo_upload']['size'] > 5000000 ) {
        $file_detect = "!!! File can't more than 5MB !!!";
    }
    if ($file_detect === 0) {
        $new_profile_photo = 'custom_profile_' . $photo_newNumericPart . '.png';
        if (move_uploaded_file($_FILES['custom_photo_upload']['tmp_name'], $target_folder . $new_profile_photo)) {
            $file_detect = 'File uploaded successfully!';
            $sql_upload = "INSERT INTO photo (photo_id, photo_name) VALUES ('$photo_newId','$new_profile_photo')";
            $conn->query($sql_upload);
        } else {
            $file_detect = '!!! Something was wrong for upload custom profile photo !!!';
            echo "<script>alert('{$file_error}');</script>";
            echo "<script>window.location.href='./create_meal_comfirm.php';</script>";
            exit();
            }
    } else {
        $file_error = $file_detect;
        echo "<script>alert('{$file_error}');</script>";
        echo "<script>window.location.href='./create_meal_comfirm.php';</script>";
        exit();
    }
} else {
    $new_profile_photo = $_POST['selected_photo'];
}

$name = $_POST['name'];
$introduction = $_POST['introduction'];
$state = $_POST['state'];
$price = $_POST['price'];

$sql_meal = "INSERT INTO meal (meal_id, meal_name, meal_price, state, introduction, profile_photo) VALUES ('$meal_newId', '$name', '$price', '$state', '$introduction', '$new_profile_photo')"; 
$conn->query($sql_meal);
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
    <link rel="stylesheet" href="../../stylesheet/style_create.css">
</head>
<body>
    <?php include("../page_all/header_page_action.php"); ?>
    <main>
    <div class="create_box_after">
    <div class="create_box_after_box">
            <p>meal ID: <?php echo $meal_newId ?></p>
            <p>meal Name: <?php echo $name ?></p>
            <p>Introduction: <?php echo $introduction ?></p>
            <p>State: <?php echo $state ?></p>
            <p class="after_photo">Profile Photo: <img src='../../image/<?php echo $new_profile_photo ?>' alt="<?php echo $name ?>"></p>
            <a href="../list_meal.php">Click here to return meal List</a>
        </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
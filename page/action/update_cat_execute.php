<?php
include_once("../../connect.php");
include_once("../get_data/get_data_account.php");

if(isset($_GET['cat'])){
    $cat = $_GET['cat'];
}else{
    $cat = 'C0000';
}

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
            echo "<script>window.location.href='../register.php';</script>";
            exit();
            }
    } else {
        $file_error = $file_detect;
        echo "<script>alert('{$file_error}');</script>";
        echo "<script>window.location.href='../register.php';</script>";
        exit();
    }
} else {
    $new_profile_photo = $_POST['selected_photo'];
}

$sql_update_cat_select_old = "SELECT * FROM cat WHERE cat_id = '$cat'";
$result_update_cat_select_old = $conn->query($sql_update_cat_select_old);
$row_update_cat_select_old = $result_update_cat_select_old->fetch_assoc();

$old_name = $row_update_cat_select_old["cat_name"];
$old_introduction = $row_update_cat_select_old["introduction"];
$old_state = $row_update_cat_select_old["state"];
$old_profile_photo = $row_update_cat_select_old["profile_photo"];


if($_POST['name'] !== '') {
    $new_name = $_POST['name'];
} else {
    $new_name = $old_name;
}
if($_POST['introduction'] !== '') {
    $new_introduction = $_POST['introduction'];
} else {
    $new_introduction = $old_introduction;
}
if($_POST['state'] !== '') {
    $new_state = $_POST['state'];
} else {
    $new_state = $old_state;
}

$sql_update_cat_execute = "UPDATE cat SET cat_name = '$new_name' , introduction = '$new_introduction' , state = '$new_state' , profile_photo = '$new_profile_photo' WHERE cat_id = '$cat'"; 
$conn->query($sql_update_cat_execute);
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
            <p>Updated cat: <?php echo $cat ?></p>
            <div class="update_box_after_box">
            <div class="after_name">
            <p>Updated Old Name: <?php echo $old_name ?></p>
            <p>Updated New Name: <?php echo $new_name ?></p>
            </div>
            <div class="after_intro">
            <p>Updated Old Introduction: <?php echo $old_introduction ?></p>
            <p>Updated New Introduction: <?php echo $new_introduction ?></p>
            </div>
            <div class="after_state">
            <p>Updated Old State: <?php echo $old_state ?></p>
            <p>Updated New State: <?php echo $new_state ?></p>
            </div>
            <div class="after_photo">
            <p>Updated Old Profile Photo: <img src='../../image/<?php echo $old_profile_photo ?>' alt="<?php echo $old_name ?>"></p>
            <p>Updated New Profile Photo: <img src='../../image/<?php echo $new_profile_photo ?>' alt="<?php echo $new_name ?>"></p>
            </div>
            </div>
            <div class="after_last">
            <a href="../list_cat.php">Click here to return Cat List</a>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
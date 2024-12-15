<?php
include("../../connect.php");
include("../get_data/get_data_account.php");
include("../get_data/get_data_photo.php");

if(isset($_GET['meal'])){
    $meal = $_GET['meal'];
}else{
    $meal = 'C0000';
}

$sql_update_meal = "SELECT * FROM meal WHERE meal_id = '$meal'";
$result_update_meal = $conn->query($sql_update_meal);
$row_update_meal = $result_update_meal->fetch_assoc();

$old_name = $row_update_meal["meal_name"];
$old_introduction = $row_update_meal["introduction"];
$old_profile_photo = $row_update_meal["profile_photo"];
$old_price = $row_update_meal["meal_price"];
$old_state = $row_update_meal["state"];


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
        <fieldset class="update_box meal">
            <legend>Update > <?php echo $_GET['meal'] ?></legend>
            <form action="update_meal_execute.php?meal=<?php echo $_GET['meal']; ?>" method="post" enctype="multipart/form-data">
                <div class="field">
                    <label for="name">Meal Name:</label><br>
                    <input type="text" id="name" name="name" placeholder="<?php echo $old_name ?>">
                </div>
                <div class="field">
                    <label for="price">Meal Price:</label><br>
                    <input type="number" id="price" name="price" placeholder="<?php echo $old_price ?>">
                </div>
                <div class="field">
                    <label for="introduction">Introduction:</label><br>
                    <textarea id="introduction" name="introduction" placeholder="<?php echo $old_introduction ?>" rows="4" cols="50"></textarea>
                </div>
                <div class="field">
                    <fieldset>
                        <legend>State: </legend>
                        <label for="state">Valid:</label>
                        <input type="radio" id="state" name="state" value="valid" <?php if($old_state == 'valid') {echo 'checked';} ?>><br>
                        <label for="state">Invalid:</label>
                        <input type="radio" id="state" name="state" value="invalid" <?php if($old_state == 'invalid') {echo 'checked';} ?>><br>
                    </fieldset>
                </div>
                <div class="field photo">
                    <fieldset>
                        <legend>Profile Photo</legend>
                        <div class="select_photo">
                            <lable class="select_photo_label <?php if($old_profile_photo == "icon_profile_000.png") {echo 'selected';} ?>">
                                <img src="../../image/icon_profile_000.png" alt="" onclick="select_photo(this)">
                                <input type="radio" name="selected_photo" id="" style="display: none;" value="icon_profile_000.png" <?php if($old_profile_photo == "icon_profile_000.png") {echo 'checked';} ?>>
                            </lable>
                        <?php if ($result_photo->num_rows > 0) { 
                            while ($row_photo = $result_photo->fetch_assoc()) { ?>
                            <lable class="select_photo_label <?php if($old_profile_photo == $row_photo['photo_name']) {echo 'selected';} ?>">
                                <img src="../../image/<?php echo $row_photo['photo_name'] ?>" alt="" onclick="select_photo(this)">
                                <input type="radio" name="selected_photo" id="" style="display: none;" value="<?php echo $row_photo['photo_name'] ?>" <?php if($old_profile_photo == $row_photo['photo_name']) {echo 'checked';} ?>>
                            </lable>
                            <?php }} ?>
                        </div>
                    </fieldset>
                    <div class="custom_photo">
                        <fieldset>
                            <legend>Custom Photo</legend>
                            <label>
                                <div class="custom_photo_display" style="width: 200px; height: 200px; margin-top: 10px; border: 2px dashed #ddd; background-color: #f8f8f8; cursor: pointer; border-radius: 40px;">
                                    <img id="custom_photo_preview" src="#" alt="Image Preview" style="display: none; width: 100%; height: 100%; object-fit: contain; border-radius: 40px;">
                                </div>
                                <input type="file" name="custom_photo_upload" id="custom_photo_upload" accept="image/*" onchange="previewImage(event)">
                            </label>
                        </fieldset>
                    </div>
                </div>
                <div class="cancle">
                    <a href="../list_meal.php">Cancle</a>
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
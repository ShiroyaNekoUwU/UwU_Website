<?php

include_once("../../connect.php");
include_once("../get_data/get_data_account.php");
include("../get_data/get_data_photo.php");

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
                <legend>Meal</legend>
                <form action="./create_meal_execute.php" method="post" enctype="multipart/form-data">
                        <div class="field">
                            <label for="name">meal name:</label><br>
                            <input type="text" id="name" name="name" placeholder="...">
                        </div>
                        <div class="field">
                            <label for="introduction">Introduction:</label><br>
                            <textarea id="introduction" name="introduction" placeholder="Enter an introduction" rows="4" cols="50"></textarea>
                        </div>
                        <div class="field">
                            <label for="price">meal price:</label><br>
                            <input type="number" id="price" name="price" placeholder="..." value="0" step="0.01">
                        </div>
                        <div class="field">
                            <fieldset>
                                <legend>State: </legend>
                                <label for="state">Valid:</label>
                                <input type="radio" id="state" name="state" value="valid" checked><br>
                                <label for="state">Invalid:</label>
                                <input type="radio" id="state" name="state" value="invalid"><br>
                            </fieldset>
                        </div>
                        <div class="field photo">
                            <fieldset>
                                <legend>Profile Photo</legend>
                                <div class="select_photo">
                                    <lable class="select_photo_label selected">
                                        <img src="../../image/icon_profile_000.png" alt="" onclick="select_photo(this)">
                                        <input type="radio" name="selected_photo" id="" style="display: none;" value="icon_profile_000.png" checked>
                                    </lable>
                                <?php if ($result_photo->num_rows > 0) { 
                                    while ($row_photo = $result_photo->fetch_assoc()) { ?>
                                    <lable class="select_photo_label">
                                        <img src="../../image/<?php echo $row_photo['photo_name'] ?>" alt="" onclick="select_photo(this)">
                                        <input type="radio" name="selected_photo" id="" style="display: none;" value="<?php echo $row_photo['photo_name'] ?>">
                                    </lable>
                                    <?php }} ?>
                                </div>
                            </fieldset>
                            <div class="custom_photo">
                                <fieldset>
                                    <legend>Custom Photo</legend>
                                    <label>
                                        <div class="custom_photo_display">
                                            <img id="custom_photo_preview" src="#" alt="Image Preview">
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
                            <input type="submit" name="submit" value="Submit">
                        </div>
                </form>
            </fieldset>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
<script src="../../javascript/profile_photo_select.js"></script>
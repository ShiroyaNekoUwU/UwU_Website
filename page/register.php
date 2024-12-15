<?php

include_once("../connect.php");
include_once("../page/get_data/get_data_account.php");
include_once("./get_data/get_data_photo.php");

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
    <link rel="stylesheet" href="../stylesheet/style_register.css">
</head>
<body>
    <?php include("./page_all/header_page.php"); ?>
    <main>
        <div class="register_form">
            <fieldset>
                <legend>Register Account</legend>
                <form action="./action/register.php" method="post" enctype="multipart/form-data">
                    <div class="register_form_form">
                        <div class="field name">
                            <label for="username">Username:</label><br>
                            <input type="text" id="username" name="username" placeholder="..." required>
                        </div>
                        <div class="field pass">
                            <label for="password">Password:</label><br>
                            <input type="password" id="password" name="password" placeholder="..." required>
                        </div>
                        <div class="field email">
                            <label for="email">Email:</label><br>
                            <input type="email" id="email" name="email" placeholder="..." required>
                        </div>
                        <div class="field num">
                            <label for="contact_num">Contact Number:</label><br>
                            <input type="tel" id="contact_num" name="contact_num" placeholder="..." required>
                        </div>
                        <div class="field photo">
                            <fieldset>
                                <legend>Profile Photo</legend>
                                <div class="select_photo">
                                    <lable class="select_photo_label selected">
                                        <img src="../image/icon_profile_000.png" alt="" onclick="select_photo(this)">
                                        <input type="radio" name="selected_photo" id="" style="display: none;" value="icon_profile_000.png" required checked>
                                    </lable>
                                <?php if ($result_photo->num_rows > 0) { 
                                    while ($row_photo = $result_photo->fetch_assoc()) { ?>
                                    <lable class="select_photo_label">
                                        <img src="../image/<?php echo $row_photo['photo_name'] ?>" alt="" onclick="select_photo(this)">
                                        <input type="radio" name="selected_photo" id="" style="display: none;" value="<?php echo $row_photo['photo_name'] ?>" required>
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
                        <?php if (in_array($now_user_group,['admin'])) { ?>
                            <div class="field group">
                        <fieldset>
                            <legend>User Group</legend>
                            <div>
                                <lable>
                                    <input type="radio" name="user_group" value="customer" id="" checked required>Customer
                                </lable><br>
                                <lable>
                                    <input type="radio" name="user_group" value="staff" id=""  required>Staff
                                </lable><br>
                                <lable>
                                    <input type="radio" name="user_group" value="admin" id=""  required>Admin
                                </lable>
                            </div>
                        </fieldset>
                    </div>
                        <?php } ?>
                        <?php if ($now_user_group == 'admin') { ?>
                        <div class="field cancle"> 
                            <a href="./list_account.php">Cancle</a>
                        </div>
                        <?php } ?>
                        <div class="field submit">
                            <input type="submit" name="submit" value="Register">
                        </div>
                        <div class="field reset">
                            <input type="reset" name="reset" value="reset">
                        </div>
                    </div>
                </form>
            </fieldset>
            <div class="register_login_text">
                <a href="login.php">If already have account, click here to log in an account.</a>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../javascript/hamburger_menu.js"></script>
<script src="../javascript/profile_photo_select.js"></script>
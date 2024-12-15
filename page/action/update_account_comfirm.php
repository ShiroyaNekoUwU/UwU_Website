<?php
include("../../connect.php");
include("../get_data/get_data_account.php");
include("../get_data/get_data_photo.php");

if(isset($_GET['account'])){
    $account = $_GET['account'];
}else{
    $account = 'B0000';
}

$sql_update_account = "SELECT * FROM account JOIN user ON account.user_id = user.user_id WHERE account.account_id = '$account'";
$result_update_account = $conn->query($sql_update_account);
$row_update_account = $result_update_account->fetch_assoc();

$old_name = $row_update_account["user_name"];
$old_email = $row_update_account["email"];
$old_password = $row_update_account["PASSWORD"];
$old_contact_num = $row_update_account["contact_num"];
$old_profile_photo = $row_update_account["profile_photo"];
$old_user_group = $row_update_account["groups"];


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
        <fieldset class="update_box account">
            <legend>Update > <?php echo $_GET['account'] ?></legend>
            <form action="update_account_execute.php?account=<?php echo $_GET['account']; ?>" method="post" enctype="multipart/form-data">
                <div class="field email">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" placeholder="<?php echo $old_email ?>">
                </div>
                <div class="field pass">
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" placeholder="<?php echo $old_password ?>">
                </div>
                <div class="field name">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" placeholder="<?php echo $old_name ?>">
                </div>
                <div class="field num">
                    <label for="contact_num">Contact Number:</label><br>
                    <input type="tel" id="contact_num" name="contact_num" placeholder="<?php echo $old_contact_num ?>">
                </div>
                <div class="field photo">
                    <fieldset class="select_photo">
                        <legend>Profile Photo</legend>
                        <div>
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
                                    <input type="radio" name="user_group" value="customer" id="" <?php if($old_user_group == 'customer') {echo 'checked';} ?> required>Customer
                                </lable><br>
                                <lable>
                                    <input type="radio" name="user_group" value="staff" id=""  <?php if($old_user_group == 'staff') {echo 'checked';} ?> required>Staff
                                </lable><br>
                                <lable>
                                    <input type="radio" name="user_group" value="admin" id=""  <?php if($old_user_group == 'admin') {echo 'checked';} ?> required>Admin
                                </lable>
                            </div>
                        </fieldset>
                    </div>
                <?php } ?>
                <div class="field cancle"> 
                    <a href="<?php echo isset($_GET['from']) && $_GET['from'] == 'list' ? '../list_account.php' : '../profile.php'; ?>">Cancle</a>
                </div>
                <div class="field reset">
                    <input type="reset" name="reset" value="Reset">
                </div>
                <div class="field submit">
                    <input type="submit" name="submit" value="Update">
                </div>
            </form>
        </fieldset>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
<script src="../../javascript/profile_photo_select.js"></script>
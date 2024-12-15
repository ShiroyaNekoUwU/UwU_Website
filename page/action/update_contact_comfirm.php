<?php
include("../../connect.php");
include("../get_data/get_data_account.php");
include("../get_data/get_data_photo.php");

if(isset($_GET['contact'])){
    $contact = $_GET['contact'];
}else{
    $contact = 'C0000';
}

$sql_update_contact = "SELECT * FROM contact WHERE contact_id = '$contact'";
$result_update_contact = $conn->query($sql_update_contact);
$row_update_contact = $result_update_contact->fetch_assoc();

$old_company = $row_update_contact["company"];
$old_name = $row_update_contact["contact_name"];
$old_num = $row_update_contact["contact_num"];
$old_email = $row_update_contact["email"];
$old_message = $row_update_contact["message"];

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
        <fieldset class="update_box contact">
            <legend>Update > <?php echo $_GET['contact'] ?></legend>
            <form action="update_contact_execute.php?contact=<?php echo $_GET['contact']; ?>" method="post" enctype="multipart/form-data">
                <div class="field">
                    <label for="company">Company:</label><br>
                    <input type="text" id="company" name="company" placeholder="<?php echo $old_company ?>">
                </div>
                <div class="field">
                    <label for="name">Contact name:</label><br>
                    <input type="text" id="name" name="name" placeholder="<?php echo $old_name ?>">
                </div>
                <div class="field">
                    <label for="number">Contact number:</label><br>
                    <input type="tel" id="number" name="number" placeholder="<?php echo $old_num ?>">
                </div>
                <div class="field">
                    <label for="emaile">Contact email:</label><br>
                    <input type="email" id="email" name="email" placeholder="<?php echo $old_email ?>">
                </div>
                <div class="field">
                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" placeholder="<?php echo $old_message ?>" rows="4" cols="50"></textarea>
                </div>
                <div class="cancle">
                    <a href="../list_contact.php">Cancle</a>
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
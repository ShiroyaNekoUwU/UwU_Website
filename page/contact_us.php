<?php

include_once("../connect.php");
include_once("./get_data/get_data_account.php");

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
    <link rel="shortcut icon" href="./../image/icon_logo.png">
    <link rel="stylesheet" href="./../stylesheet/style_all.css">
    <link rel="stylesheet" href="./../stylesheet/style_header.css">
    <link rel="stylesheet" href="./../stylesheet/style_create.css">
</head>
<body>
    <?php include("./page_all/header_page.php"); ?>
    <main>
        <div class="create_box">
            <fieldset>
                <legend>Contact Us</legend>
                <form action="./action/create_contact_execute.php<?php echo isset($_GET['from']) ? '?from=' . $_GET['from'] : ''; ?>" method="post">
                        <div class="field company">
                            <label for="company">Company:</label>
                            <input type="text" name="company" id="company" placeholder="..." required>
                        </div>
                        <div class="field name">
                            <label for="name">Your Name:</label>
                            <input type="text" name="name" id="name" placeholder="..." required>
                        </div>
                        <div class="field num">
                            <label for="num">Your Contact Number:</label>
                            <input type="tel" name="num" id="num" placeholder="..." required>
                        </div>
                        <div class="field email">
                            <label for="email">Your Email:</label>
                            <input type="email" name="email" id="email" placeholder="..." required>
                        </div>
                        <div class="field message">
                            <label for="message">Message:</label><br>
                            <textarea id="message" name="message" placeholder="Enter message" rows="4" cols="50" required></textarea>
                        </div>
                        <div class="cancle">
                            <a href="<?php echo isset($_GET['from']) && $_GET['from'] == 'list' ? './list_contact.php' : './../index.php'; ?>">Cancle</a>
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
<script src="./../javascript/hamburger_menu.js"></script>
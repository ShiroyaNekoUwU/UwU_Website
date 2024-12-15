<?php

include("../connect.php");
include("./get_data/get_data_account.php");

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
    <link rel="stylesheet" href="../stylesheet/style_login.css">
</head>
<body>
    <?php include("./page_all/header_page.php"); ?>
    <main>
        <div class="login_form">
            <fieldset>
                <legend>Log In</legend>
                <form action="./action/login.php" method="post">
                    <div class="login_form_form">
                        <div class="field id">
                            <label for="account_id">Account ID:</label><br>
                            <input type="account_id" id="account_id" name="account_id" placeholder="..." required>
                        </div>
                        <div class="field pass">
                            <label for="password">Password:</label><br>
                            <input type="password" id="password" name="password" placeholder="..." required>
                        </div>
                        <div class="img">
                            <img src="../image/icon_logo.png" alt="">
                        </div>
                        <div class="set">
                            <div class="reset">
                                <input type="reset" name="reset" value="Reset" onclick="">
                            </div>
                            <div class="submit">
                                <input type="submit" name="submit" value="LogIn" onclick="">
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>
            <div class="login_register_text">
                <a href="./register.php">If didn't have account, click here to register an account.</a>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../javascript/hamburger_menu.js"></script>
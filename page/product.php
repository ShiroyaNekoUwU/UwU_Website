<?php

include('../connect.php');
include('./get_data/get_data_account.php');


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
    <link rel="stylesheet" href="../stylesheet/style_product.css">
    <link rel="stylesheet" href="../stylesheet/style_footer.css">
</head>
<body>
    <?php include("./page_all/header_page.php"); ?>
    <main>
        <section class="product_selection">
            <div class="product_selection_box">
                <a href="product_cat.php">
                    <img src="../image/img_display_cat_1.png" alt="Product_Cat">
                    <p>We Cute Waiter</p>
                    <p>Click Here Go to Cat Page</p>
                </a>
            </div>
            <div class="product_selection_box">
                <a href="product_meal.php">
                    <img src="../image/img_display_food_1.png" alt="Product_Food">
                    <p>Meal</p>
                    <p>Click Here Go to Meal Page</p>
                </a>
            </div>
        </section>
    </main>
    <?php include('./page_all/footer.php') ?>
</body>
</html>
<script src="../javascript/hamburger_menu.js"></script>
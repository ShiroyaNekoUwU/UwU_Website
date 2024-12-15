<?php

include('../connect.php');
include('./get_data/get_data_account.php');
$sql_cat = "SELECT * FROM cat ORDER BY cat_id LIMIT 10";
$result_cat = $conn->query($sql_cat);
$cat_count = 0;

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
    <link rel="stylesheet" href="../stylesheet/style_footer.css">
    <link rel="stylesheet" href="../stylesheet/style_product_cat.css">
</head>
<body>
    <?php include("./page_all/header_page.php"); ?>
    <main>
        <section class="productcat_box">
            <fieldset>
                <legend>Our Cat</legend>
                <?php if ($result_cat->num_rows > 0) {
                while ($row_cat = $result_cat->fetch_assoc()) {
                    $cat_count += 1; ?>
                <div class="<?php echo $cat_count % 2 !== 0 ? 'productcat_box_odd' : 'productcat_box_even' ?>" id="<?php echo $row_cat['cat_name'] ?>">
                    <div class="<?php echo $cat_count % 2 !== 0 ? 'productcat_box_odd' : 'productcat_box_even' ?>_1">
                        <img src="../image/<?php echo $row_cat['profile_photo'] ?>" alt="<?php echo $row_cat['cat_name'] ?>">
                    </div>
                    <div class="<?php echo $cat_count % 2 !== 0 ? 'productcat_box_odd' : 'productcat_box_even' ?>_2">
                        <h1><?php echo $row_cat['cat_name'] ?></h1>
                        <p><?php echo $row_cat['introduction'] ?></p>
                        <p><?php echo $row_cat['state'] ?></p>
                    </div>
                </div>
                <?php }} else { ?>
                <div class="productcat_box_odd" id="None">
                    <div class="productcat_box_odd_1">
                        <img src="../image/image_cat_default.png" alt="none">
                    </div>
                    <div class="productcat_box_odd_2">
                        <h1>None</h1>
                        <p>Something was wrong, please contact our staff.</p>
                    </div>
                </div>
                <?php } ?>
                <?php if (in_array($now_user_group,['admin'])) {?>
                    <div class="under_text">
                        <a href="./action/create_cat_comfirm.php">Add more Cat +</a>
                    </div>
                <?php } ?>
            </fieldset>
        </section>

    </main>
    <?php include('./page_all/footer.php') ?>
</body>
</html>
<script src="../javascript/hamburger_menu.js"></script>
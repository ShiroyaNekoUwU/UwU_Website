<?php

include('../connect.php');
include('./get_data/get_data_account.php');
$sql_meal = "SELECT * FROM meal ORDER BY meal_id LIMIT 10";
$result_meal = $conn->query($sql_meal);
$meal_count = 0;

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
    <link rel="stylesheet" href="../stylesheet/style_product_meal.css">
</head>
<body>
    <?php include("./page_all/header_page.php"); ?>
    <main>
        <section class="productfood">
            <fieldset>
                <legend>Meal</legend>
                <div class="product_meal">
                    <?php if ($result_meal->num_rows > 0) {
                        while ($row_meal = $result_meal->fetch_assoc()) {
                            $meal_count += 1; ?>
                    <div class="productfood_box">
                        <div class="productfood_box_img">
                            <img src="../image/<?php echo $row_meal['profile_photo'] ?>" alt="<?php echo $row_meal['meal_name'] ?>">
                        </div>
                        <div>
                            <h1><?php echo $row_meal['meal_name'] ?></h1>
                            <p><?php echo $row_meal['introduction'] ?></p>
                            <div>
                                RM <?php echo $row_meal['meal_price'] ?>
                            </div>
                        </div>
                    </div>
                    <?php }} else { ?>
                    <div class="productfood_box">
                        <div class="productfood_box_img">
                            <img src="../image/image_meal_default.png" alt="none">
                        </div>
                        <div>
                            <h1>None</h1>
                            <p>Something was wrong, please contact our staff.</p>
                            <div>
                                RM N/A
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php if (in_array($now_user_group,['admin'])) {?>
                    <div class="under_text">
                        <a href="./action/create_meal_comfirm.php">Add more Meal +</a>
                    </div>
                <?php } ?>
            </fieldset>
        </section>
    </main>
    <?php include('./page_all/footer.php') ?>
</body>
</html>
<script src="../javascript/hamburger_menu.js"></script>
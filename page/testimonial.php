<?php

include('../connect.php');
include('./get_data/get_data_account.php');
$sql_testimonial = "SELECT * FROM testimonial ORDER BY testimonial_id DESC LIMIT 10";
$result_testimonial = $conn->query($sql_testimonial);

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
    <link rel="stylesheet" href="../stylesheet/style_testimonial.css">
    <link rel="stylesheet" href="../stylesheet/style_footer.css">
</head>
<body>
    <?php include("./page_all/header_page.php"); ?>
    <main>
        <section class="testimonial">
            <fieldset>
                <legend>Testimonial From Our Customer</legend>
                <?php if ($result_testimonial->num_rows > 0) {
                while ($row_testimonial = $result_testimonial->fetch_assoc()) {
                    $sql_testimonial_select_account = "SELECT user.user_name, user.profile_photo FROM account JOIN user ON account.user_id = user.user_id WHERE account.account_id = '" . $row_testimonial['account_id'] . "'";
                    $result_testimonial_select_account = $conn->query($sql_testimonial_select_account);
                    $row_testimonial_select_account = $result_testimonial_select_account->fetch_assoc(); ?>
                <div class="testimonial_box">
                    <img src="../image/<?php echo $row_testimonial_select_account['profile_photo'] ?>" alt="<?php echo $row_testimonial_select_account['user_name'] ?>" class="photo">
                    <h1 class="name"><?php echo $row_testimonial_select_account['user_name'] ?></h1>
                    <h1 class="rate"><?php $row_testimonial_num = max(0 , min($row_testimonial['rate'], 5)); echo (str_repeat("★", $row_testimonial_num) . str_repeat("☆", 5 - $row_testimonial_num)) ?></h1>
                    <p class="text"><?php echo $row_testimonial['message'] ?></p>
                </div>
                <?php }} else { ?>
                <div class="testimonial_box">
                    <img src="../image/custom_profile_0001.png" alt="None" class="photo">
                    <h1 class="name">None</h1>
                    <h1 class="rate">☆☆☆☆☆</h1>
                    <p class="text">Something was wrong, please contact our staff.</p>
                </div>
                <?php } ?>
                <?php if (in_array($now_user_group,['customer','staff','admin'])) {?>
                    <div class="under_text">
                        <a href="./action/create_testimonial_comfirm.php">Add more Testimonial +</a>
                    </div>
                <?php } ?>
            </fieldset>
        </section>

    </main>
    <?php include('./page_all/footer.php') ?>
</body>
</html>
<script src="../javascript/hamburger_menu.js"></script>
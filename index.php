<?php

include_once("connect.php");
include_once("page/get_data/get_data_cat.php");
include_once("page/get_data/get_data_meal.php");
include_once("page/get_data/get_data_account.php");

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
    <link rel="shortcut icon" href="./image/icon_logo.png">
    <link rel="stylesheet" href="./stylesheet/style_all.css">
    <link rel="stylesheet" href="./stylesheet/style_header.css">
    <link rel="stylesheet" href="./stylesheet/style_index.css">
    <link rel="stylesheet" href="./stylesheet/style_footer.css">
</head>
<body>
    <?php include("./page/page_all/header_index.php"); ?>
    <section class="welcome" id="welcome">
        <div class="welcome_text" id="welcome_text">
            <h1>Welcome</h1>
            <p>A cafe for you with our cats</p>
        </div>
    </section>
    <main>
        <section class="about" id="about">
            <div class="about about_div" id="about">
                <div class="about_content_image about_box" id="about_content_image">
                    <img src="./image/index_about_content.png" alt="img_about_content">
                </div>
                <div class="about_content_text about_box" id="about_content_text">
                    <h1>About us</h1>
                    <p>Welcome to Catfe, where coffee and cat lovers unite!<br>
                        At Catfe, we believe in creating a unique and delightful experience that combines 
                        the joy of feline companionship with the pleasure of savoring your favorite coffee. 
                        Located in the heart of [Kuala Lumpur], our cozy cafe offers a serene escape from the 
                        hustle and bustle of everyday life.</p>
                    <h1>Our Mission</h1>
                    <p>At Catfe, our mission is to provide a peaceful and inviting space where our guests can unwind, connect, and share moments of joy with our adorable resident cats. We aim to foster a community of cat enthusiasts and coffee lovers. </p>
                </div>
            </div>
            <div class="about about_div" id="about">
                <div class="about_location_text about_box" id="about_location_text">
                    <h1>Location</h1>
                    <p>Nestled in the vibrant [Neighborhood Name], Catfé is easily accessible and surrounded by local shops and attractions. We’re just a short walk from [Landmark or Popular Spot], making us a perfect destination for both locals and visitors. With cozy indoor seating and a charming outdoor patio, you’ll find the perfect spot to unwind.</p>
                </div>
                <div class="about_location_map about_box" id="about_location_map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1991.9194938255005!2d101.60631343914797!3d3.137196213279997!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4eced3899b17%3A0x770a82f503556789!2z5LiH6L6-5aSn5a2m5a2m6Zmi!5e0!3m2!1szh-CN!2smy!4v1724291093340!5m2!1szh-CN!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
        <section class="schedule">
            <div>
                <h1>Schedule</h1>
            </div>
            <div>
                <table border="2px">
                    <tr>
                        <th></th>
                        <th><img src="image/icon_monday.png"></th>
                        <th><img src="image/icon_tuesday.png"></th>
                        <th><img src="image/icon_wednesday.png"></th>
                        <th><img src="image/icon_thusday.png"></th>
                        <th><img src="image/icon_friday.png"></th>
                        <th><img src="image/icon_saturday.png"></th>
                        <th><img src="image/icon_sunday.png"></th>
                    </tr>
                    <tr>
                        <td>Open</td>
                        <td>10:00a.m.</td>
                        <td>10:00a.m.</td>
                        <td>10:00a.m.</td>
                        <td>10:00a.m.</td>
                        <td>10:00a.m.</td>
                        <td>10:00a.m.</td>
                        <td>10:00a.m.</td>
                    </tr>
                    <tr>
                        <td>Lunch</td>
                        <td>2:00p.m.</td>
                        <td>2:00p.m.</td>
                        <td>2:00p.m.</td>
                        <td>2:00p.m.</td>
                        <td>2:00p.m.</td>
                        <td>2:00p.m.</td>
                        <td>2:00p.m.</td>
                    </tr>
                    <tr>
                        <td>Close</td>
                        <td>6:00p.m.</td>
                        <td>6:00p.m.</td>
                        <td>6:00p.m.</td>
                        <td>6:00p.m.</td>
                        <td>6:00p.m.</td>
                        <td>6:00p.m.</td>
                        <td>6:00p.m.</td>
                    </tr>
                </table>
            </div>
        </section>
        <section class="display_cat" id="display_cat">
            <div class="display_cat_header">
                <h1>Our Cute Waiter</h1>
            </div>
            <div class="display_cat_about" id="display_cat_about">
                <?php if ($result_cat->num_rows > 0) { 
                        while ($row_cat = $result_cat->fetch_assoc()) {?>
                <div class="display_cat_about_box">
                    <img src="./image/<?php echo $row_cat['profile_photo'] ?>" alt="<?php echo $row_cat['cat_name'] ?>">
                    <h1><?php echo $row_cat['cat_name'] ?></h1>
                    <p><?php echo $row_cat['introduction'] ?></p>
                    <div class="display_cat_about_box_more"><a href="./page/product_cat.php#<?php echo $row_cat['cat_name'] ?>">More+</a></div>
                </div>
                <?php }} ?>
                <?php for ($i = $result_cat->num_rows; $i < 3; $i++) { ?>
                <div class="display_cat_about_box">
                    <img src="./image/cat_profile_000.png" alt="None">
                    <h1>Coming Soon</h1>
                    <p>New cute cat is coming soon to our cafe!</p>
                    <div class="display_cat_about_box_more"><a href="./page/product_cat.php">More+</a></div>
                </div>
                <?php } ?>
            <div class="display_cat_about_box_more"><a href="./page/product_cat.php">More Cute Waiter+</a></div>
        </section>
        <section class="display_food" id="display_food">
            <div class="display_food_header">
                <h1>Our Food</h1>
            </div>
            <div class="display_food_about" id="display_food_about">
                <?php if ($result_meal->num_rows > 0) { 
                        while ($row_meal = $result_meal->fetch_assoc()) {?>
                <div class="display_food_about_box">
                    <img src="./image/<?php echo $row_meal['profile_photo'] ?>" alt="<?php echo $row_meal['meal_name'] ?>">
                    <h1><?php echo $row_meal['meal_name'] ?></h1>
                    <p><?php echo $row_meal['introduction'] ?></p>
                    <div class="display_food_about_box_more"><a href="./page/product_meal.php#<?php echo $row_meal['meal_name'] ?>">More+</a></div>
                </div>
                <?php }} ?>
                <?php for ($i = $result_meal->num_rows; $i < 3; $i++) { ?>
                <div class="display_food_about_box">
                    <img src="./image/food_profile_000.png" alt="None">
                    <h1>Coming Soon</h1>
                    <p>New food is coming soon to our cafe!</p>
                    <div class="display_food_about_box_more"><a href="./page/product_meal.php">More+</a></div>
                </div>
                <?php } ?>
            <div class="display_food_about_box_more"><a href="./page/product_meal.php">More Cute Waiter+</a></div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Catfe. All rights reserved.</p>
        <ul>
            <li><a href="PrivacyPolicy.html">Privacy Policy</a></li>
            <li><a href="TermsOfService.html">Terms of Service</a></li>
        </ul>
    </footer>
</body>
</html>
<script src="javascript/hamburger_menu.js"></script>
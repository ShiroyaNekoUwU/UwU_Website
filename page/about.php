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
    <link rel="stylesheet" href="../stylesheet/style_about.css">
    <link rel="stylesheet" href="../stylesheet/style_footer.css">
</head>
<body>
    <?php include('./page_all/header_page.php'); ?>
    <section class="about-2_welcome">
            <div>
                <h1>Welcome to Catfé: Where Coffee Meets Cats!</h1>
            </div>
        </section>
    <main>
        <section class="about-2_text">
            <div class="about-2_text_box_1">
                <img src="../image/about_002.jpg" alt="about_002">
            </div>
            <div class="about-2_text_box_2">
                At Catfé, we blend the warmth of a café with the playful energy of a cat lounge. Located in the heart of [City Name], our unique space invites you to enjoy your favorite coffee or tea while spending time with our friendly feline residents. Whether you’re looking to relax, connect with others, or just experience something different, Catfé offers an unforgettable experience.
            </div>
            <div class="about-2_text_box_3">
                What We Offer: <br>Delicious Drinks & Treats: Savor a variety of specialty coffees, teas, and fresh pastries.<br>
                Friendly Felines: <br>Our cats are the heart of Catfé. They’re not only adorable but also adoptable! Every visit helps support their care.<br>
                Interactive Space: <br>From comfy couches to playful nooks, our cat lounge is designed for both relaxation and fun.<br>
                Special Events: <br>Join us for themed nights, cat yoga sessions, art workshops, and more. There’s always something happening at Catfé!<br>
                Adoption Center: <br>Ready to give a cat a forever home? We partner with local shelters to help match our cats with loving families.
            </div>
            <div class="about-2_text_box_4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1991.9194938255005!2d101.60631343914797!3d3.137196213279997!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4eced3899b17%3A0x770a82f503556789!2z5LiH6L6-5aSn5a2m5a2m6Zmi!5e0!3m2!1szh-CN!2smy!4v1724291093340!5m2!1szh-CN!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="about-2_text_box_5">
                Our Location: <br>Nestled in the vibrant [Neighborhood Name], Catfé is easily accessible and surrounded by local shops and attractions. We’re just a short walk from [Landmark or Popular Spot], making us a perfect destination for both locals and visitors. With cozy indoor seating and a charming outdoor patio, you’ll find the perfect spot to unwind.
            </div>
            <div class="about-2_text_box_6">
                Our Story: <br>Catfé began with a simple idea: creating a place where people and cats could come together in a joyful environment. Founded in [Year Established], we started as a small café with a big dream. Over the years, we've grown into a beloved community spot, known for our welcoming atmosphere and dedication to helping cats find their forever homes.
                Our commitment to animal welfare and creating memorable experiences for our guests continues to drive everything we do. Whether you’re here for a quick coffee break or an afternoon of cat cuddles, we’re excited to share our journey with you.    
            </div>
        </section>
    </main>
    <?php include('./page_all/footer.php') ?>
</body>
</html>
<script src="../javascript/hamburger_menu.js"></script>
<?php 
include("../../connect.php");
include("../get_data/get_data_account.php");

if(isset($_GET['testimonial'])){
    $testimonial = $_GET['testimonial'];
}else{
    $testimonial = 'P0000';
}

$sql_delete_testimonial = "SELECT * FROM testimonial WHERE testimonial_id = '$testimonial'";
$result_delete_testimonial = $conn->query($sql_delete_testimonial);
$row_delete_testimonial = $result_delete_testimonial->fetch_assoc();
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
    <link rel="stylesheet" href="../../stylesheet/style_delete.css">
</head>
<body>
    <?php include("../page_all/header_page_action.php"); ?>
    <main>
        <div class="delete">
            <div class="delete_data">
                <div>
                    <h2>Testimonial ID: <?php echo $row_delete_testimonial['testimonial_id'] ?></h2>
                </div>
                <div>
                    <h2>Account ID: <?php echo $row_delete_testimonial['account_id'] ?></h2>
                </div>
                <div>
                    <h2>Meal ID: <?php echo $row_delete_testimonial['meal_id'] ?></h2>
                </div>
                <div>
                    <h2>Cat ID: <?php echo $row_delete_testimonial['cat_id'] ?></h2>
                </div>
                <div>
                    <h2>Message: <?php echo $row_delete_testimonial['message'] ?></h2>
                </div>
                <div>
                    <h2>Testimonial Date: <?php echo $row_delete_testimonial['testimonial_date'] ?></h2>
                </div>
                <div>
                    <h2>Testimonial Rate: <?php $row_delete_testimonial_num = max(0 , min($row_delete_testimonial['rate'], 5)); echo (str_repeat("★", $row_delete_testimonial_num) . str_repeat("☆", 5 - $row_delete_testimonial_num)) ?></h2>
                </div>
            </div>
            <div class="delete_comfirm">
                <div class="comfirm_cancle">
                    <a href="../list_testimonial.php">Cancle</a>
                </div>
                <div class="comfirm_delete">
                    <a href="delete_testimonial_execute.php?testimonial=<?php echo $row_delete_testimonial['testimonial_id']; ?>">Delete</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
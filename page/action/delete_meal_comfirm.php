<?php 
include("../../connect.php");
include("../get_data/get_data_account.php");

if(isset($_GET['meal'])){
    $meal = $_GET['meal'];
}else{
    $meal = 'M0000';
}

$sql_delete_meal = "SELECT * FROM meal WHERE meal_id = '$meal'";
$result_delete_meal = $conn->query($sql_delete_meal);
$row_delete_meal = $result_delete_meal->fetch_assoc();
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
                    <h2>Meal ID: <?php echo $row_delete_meal['meal_id'] ?></h2>
                </div>
                <div>
                    <h2>Meal Name: <?php echo $row_delete_meal['meal_name'] ?></h2>
                </div>
                <div>
                    <h2>Meal Price: RM <?php echo $row_delete_meal['meal_price'] ?></h2>
                </div>
                <div>
                    <h2>Introduction: <?php echo $row_delete_meal['introduction'] ?></h2>
                </div>
                <div class="photo">
                    <h2>Profile Photo: <img src="../../image/<?php echo $row_delete_meal['profile_photo'] ?>" alt="<?php echo $row_delete_meal['meal_name'] ?>"></h2>
                </div>
                <div>
                    <h2>State: <?php echo $row_delete_meal['state'] ?></h2>
                </div>
            </div>
            <div class="delete_comfirm">
                <div class="comfirm_cancle">
                    <a href="../list_meal.php">Cancle</a>
                </div>
                <div class="comfirm_delete">
                    <a href="delete_meal_execute.php?meal=<?php echo $row_delete_meal['meal_id']; ?>">Delete</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
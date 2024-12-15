<?php
include("../connect.php");
include("./get_data/get_data_account.php");

$sql_list_meal = "SELECT * FROM meal";
$result_list_meal = $conn->query($sql_list_meal);
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
    <link rel="stylesheet" href="../stylesheet/style_list_meal.css">
</head>
<body>
    <?php include('./page_all/header_page.php'); ?>
    <main>
        <div class="list_meal">
            <fieldset>
                <legend>Meal List</legend>
                <div class="list_meal_table">
                    <table>
                        <thead>
                            <tr>
                                <th>Meal ID</th>
                                <th>Meal Name</th>
                                <th>Meal Price</th>
                                <th>Introduction</th>
                                <th>Profile Photo</th>
                                <th>State</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php if ($result_list_meal->num_rows > 0) {
                            while ($row_list_meal = $result_list_meal->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_list_meal['meal_id'] ?></td>
                                <td><?php echo $row_list_meal['meal_name'] ?></td>
                                <td>RM<?php echo $row_list_meal['meal_price'] ?></td>
                                <td><?php echo $row_list_meal['introduction'] ?></td>
                                <td><img src="../image/<?php echo $row_list_meal['profile_photo'] ?>" alt="<?php echo $row_list_meal['meal_name'] ?>"></td>
                                <td class="<?php echo $row_list_meal['state'] ?>"><?php echo $row_list_meal['state'] ?></td>
                                <td class="update"><a href="./action/update_meal_comfirm.php?meal=<?php echo $row_list_meal['meal_id']; ?>">Update</a></td>
                                <td class="delete"><a href="./action/delete_meal_comfirm.php?meal=<?php echo $row_list_meal['meal_id']; ?>">Delete</a></td>
                            </tr>
                        <?php }} else { ?>
                            <tr>
                                <td colspan="8">Not Data Found</td>
                            </tr>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="add"><a href="./action/create_meal_comfirm.php">Add more Meal +</a></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </fieldset>
        </div>
    </main>
</body>
</html>
<script src="../javascript/hamburger_menu.js"></script>
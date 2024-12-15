<?php
include("../connect.php");
include("./get_data/get_data_account.php");

$sql_list_testimonial = "SELECT * FROM testimonial";
$result_list_testimonial = $conn->query($sql_list_testimonial);
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
    <link rel="stylesheet" href="../stylesheet/style_list_testimonial.css">
</head>
<body>
    <?php include('./page_all/header_page.php'); ?>
    <main>
        <div class="list_testimonial">
            <fieldset>
                <legend>Testimonial List</legend>
                <div class="list_testimonial_table">
                    <table>
                        <thead>
                            <tr>
                                <th>Testimonial ID</th>
                                <th>Account ID</th>
                                <th>Meal ID</th>
                                <th>Cat ID</th>
                                <th>Rate</th>
                                <th>Message</th>
                                <th>Testimonial Date</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php if ($result_list_testimonial->num_rows > 0) {
                            while ($row_list_testimonial = $result_list_testimonial->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_list_testimonial['testimonial_id'] ?></td>
                                <td><?php echo $row_list_testimonial['account_id'] ?></td>
                                <td><?php echo $row_list_testimonial['meal_id'] ?></td>
                                <td><?php echo $row_list_testimonial['cat_id'] ?></td>
                                <td><?php $row_list_testimonial_num = max(0 , min($row_list_testimonial['rate'], 5)); echo (str_repeat("★", $row_list_testimonial_num) . str_repeat("☆", 5 - $row_list_testimonial_num)) ?></td>
                                <td><?php echo $row_list_testimonial['message'] ?></td>
                                <td><?php echo $row_list_testimonial['testimonial_date'] ?></td>
                                <td class="update"><a href="./action/update_testimonial_comfirm.php?testimonial=<?php echo $row_list_testimonial['testimonial_id']; ?>">Update</a></td>
                                <td class="delete"><a href="./action/delete_testimonial_comfirm.php?testimonial=<?php echo $row_list_testimonial['testimonial_id']; ?>">Delete</a></td>
                            </tr>
                        <?php }} else { ?>
                            <tr>
                                <td colspan="9">Not Data Found</td>
                            </tr>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="9" class="add"><a href="./action/create_testimonial_comfirm.php?from=list">Add more Testimonial +</a></td>
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
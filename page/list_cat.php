<?php
include("../connect.php");
include("./get_data/get_data_account.php");

$sql_list_cat = "SELECT * FROM cat";
$result_list_cat = $conn->query($sql_list_cat);
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
    <link rel="stylesheet" href="../stylesheet/style_list_cat.css">
</head>
<body>
    <?php include('./page_all/header_page.php'); ?>
    <main>
        <div class="list_cat">
            <fieldset>
                <legend>Cat List</legend>
                <div class="list_cat_table">
                    <table>
                        <thead>
                            <tr>
                                <th>Cat ID</th>
                                <th>Cat Name</th>
                                <th>Introduction</th>
                                <th>Profile Photo</th>
                                <th>State</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php if ($result_list_cat->num_rows > 0) {
                            while ($row_list_cat = $result_list_cat->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_list_cat['cat_id'] ?></td>
                                <td><?php echo $row_list_cat['cat_name'] ?></td>
                                <td><?php echo $row_list_cat['introduction'] ?></td>
                                <td><img src="../image/<?php echo $row_list_cat['profile_photo'] ?>" alt="<?php echo $row_list_cat['cat_name'] ?>"></td>
                                <td class="<?php echo $row_list_cat['state'] ?>"><?php echo $row_list_cat['state'] ?></td>
                                <td class="update"><a href="./action/update_cat_comfirm.php?cat=<?php echo $row_list_cat['cat_id']; ?>">Update</a></td>
                                <td class="delete"><a href="./action/delete_cat_comfirm.php?cat=<?php echo $row_list_cat['cat_id']; ?>">Delete</a></td>
                            </tr>
                        <?php }} else { ?>
                            <tr>
                                <td colspan="7">Not Data Found</td>
                            </tr>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="add"><a href="./action/create_cat_comfirm.php">Add more Cat +</a></td>
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
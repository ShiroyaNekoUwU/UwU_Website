<?php
include("../connect.php");
include("./get_data/get_data_account.php");

$sql_list_photo = "SELECT * FROM photo";
$result_list_photo = $conn->query($sql_list_photo);
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
    <link rel="stylesheet" href="../stylesheet/style_list_photo.css">
</head>
<body>
    <?php include('./page_all/header_page.php'); ?>
    <main>
        <div class="list_photo">
            <fieldset>
                <legend>Photo List</legend>
                <div class="list_photo_table">
                    <table>
                        <thead>
                            <tr>
                                <th>Photo ID</th>
                                <th>Photo Name</th>
                                <th>Photo</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php if ($result_list_photo->num_rows > 0) {
                            while ($row_list_photo = $result_list_photo->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_list_photo['photo_id'] ?></td>
                                <td><?php echo $row_list_photo['photo_name'] ?></td>
                                <td><img src="../image/<?php echo $row_list_photo['photo_name'] ?>" alt="<?php echo $row_list_photo['photo_name'] ?>"></td>
                                <td class="delete"><a href="./action/delete_photo_comfirm.php?photo=<?php echo $row_list_photo['photo_id']; ?>">Delete</a></td>
                            </tr>
                        <?php }} else { ?>
                            <tr>
                                <td colspan="8">Not Data Found</td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </fieldset>
        </div>
    </main>
</body>
</html>
<script src="../javascript/hamburger_menu.js"></script>
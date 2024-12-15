<?php
include("../connect.php");
include("./get_data/get_data_account.php");

$sql_list_account = "SELECT * FROM account INNER JOIN user on account.user_id = user.user_id ORDER BY account.account_id";
$result_list_account = $conn->query($sql_list_account);
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
    <link rel="stylesheet" href="../stylesheet/style_list_account.css">
</head>
<body>
    <?php include('./page_all/header_page.php'); ?>
    <main>
        <div class="list_account">
            <fieldset>
                <legend>Account List</legend>
                <div class="list_account_table">
                    <table>
                        <thead>
                            <tr>
                                <th>Account ID</th>
                                <th>User ID</th>
                                <th>User Email</th>
                                <th>User Name</th>
                                <th>Contact Number</th>
                                <th>Profile Photo</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php if ($result_list_account->num_rows > 0) {
                            while ($row_list_account = $result_list_account->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_list_account['account_id'] ?></td>
                                <td><?php echo $row_list_account['user_id'] ?></td>
                                <td><?php echo $row_list_account['email'] ?></td>
                                <td><?php echo $row_list_account['user_name'] ?></td>
                                <td><?php echo $row_list_account['contact_num'] ?></td>
                                <td><img src="../image/<?php echo $row_list_account['profile_photo'] ?>" alt="<?php echo $row_list_account['user_name'] ?>"></td>
                                <td class="update"><a href="./action/update_account_comfirm.php?account=<?php echo $row_list_account['account_id']; ?>&from=list">Update</a></td>
                                <td class="delete"><a href="./action/delete_account_comfirm.php?account=<?php echo $row_list_account['account_id']; ?>">Delete</a></td>
                            </tr>
                        <?php }} else { ?>
                            <tr>
                                <td colspan="8">Not Data Found</td>
                            </tr>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="add"><a href="./register.php">Add more account +</a></td>
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
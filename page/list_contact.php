<?php
include("../connect.php");
include("./get_data/get_data_account.php");

$sql_list_contact = "SELECT * FROM contact";
$result_list_contact = $conn->query($sql_list_contact);
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
    <link rel="stylesheet" href="../stylesheet/style_list_contact.css">
</head>
<body>
    <?php include('./page_all/header_page.php'); ?>
    <main>
        <div class="list_contact">
            <fieldset>
                <legend>contact List</legend>
                <div class="list_contact_table">
                    <table>
                        <thead>
                            <tr>
                                <th>Contact ID</th>
                                <th>Company</th>
                                <th>Contact Name</th>
                                <th>Contact Number</th>
                                <th>Contact Email</th>
                                <th>Message</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php if ($result_list_contact->num_rows > 0) {
                            while ($row_list_contact = $result_list_contact->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_list_contact['contact_id'] ?></td>
                                <td><?php echo $row_list_contact['company'] ?></td>
                                <td><?php echo $row_list_contact['contact_name'] ?></td>
                                <td><?php echo $row_list_contact['contact_num'] ?></td>
                                <td><?php echo $row_list_contact['email'] ?></td>
                                <td><?php echo $row_list_contact['message'] ?></td>
                                <td class="update"><a href="./action/update_contact_comfirm.php?contact=<?php echo $row_list_contact['contact_id']; ?>">Update</a></td>
                                <td class="delete"><a href="./action/delete_contact_comfirm.php?contact=<?php echo $row_list_contact['contact_id']; ?>">Delete</a></td>
                            </tr>
                        <?php }} else { ?>
                            <tr>
                                <td colspan="8">Not Data Found</td>
                            </tr>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="add"><a href="./contact_us.php?from=list">Add more contact +</a></td>
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
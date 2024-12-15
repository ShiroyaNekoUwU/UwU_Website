<?php
include("../connect.php");
include("./get_data/get_data_account.php");

$sql_list_appointment = "SELECT * FROM appointment";
$result_list_appointment = $conn->query($sql_list_appointment);
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
    <link rel="stylesheet" href="../stylesheet/style_list_appointment.css">
</head>
<body>
    <?php include('./page_all/header_page.php'); ?>
    <main>
        <div class="list_appointment">
            <fieldset>
                <legend>Appointment List</legend>
                <div class="list_appointment_table">
                    <table>
                        <thead>
                            <tr>
                                <th>Appointment ID</th>
                                <th>Account ID</th>
                                <th>Cat ID</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Appointment People</th>
                                <th>Message</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php if ($result_list_appointment->num_rows > 0) {
                            while ($row_list_appointment = $result_list_appointment->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_list_appointment['appointment_id'] ?></td>
                                <td><?php echo $row_list_appointment['account_id'] ?></td>
                                <td><?php echo $row_list_appointment['cat_id'] ?></td>
                                <td><?php echo $row_list_appointment['appointment_date'] ?></td>
                                <td><?php echo $row_list_appointment['appointment_time'] ?></td>
                                <td><?php echo $row_list_appointment['appointment_people'] ?></td>
                                <td><?php echo $row_list_appointment['message'] ?></td>
                                <td class="update"><a href="./action/update_appointment_comfirm.php?appointment=<?php echo $row_list_appointment['appointment_id']; ?>">Update</a></td>
                                <td class="delete"><a href="./action/delete_appointment_comfirm.php?appointment=<?php echo $row_list_appointment['appointment_id']; ?>">Delete</a></td>
                            </tr>
                        <?php }} else { ?>
                            <tr>
                                <td colspan="9">Not Data Found</td>
                            </tr>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="9" class="add"><a href="./action/create_appointment_comfirm.php?from=list">Add more Appointment +</a></td>
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
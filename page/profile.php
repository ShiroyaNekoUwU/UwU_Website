<?php

include_once("../connect.php");

if (!isset($_SESSION['account'])) {
    header('Location: login.php');
    exit;
}
include_once("./get_data/get_data_account.php");
include_once("./get_data/get_data_order.php");
include_once("./get_data/get_data_appointment.php");
include_once("./get_data/get_data_testimonial.php");

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
    <link rel="stylesheet" href="../stylesheet/style_profile.css">
    <link rel="stylesheet" href="../stylesheet/style_footer.css">
</head>
<body>
    <?php include("./page_all/header_page.php"); ?>
    <main>
        <div class="profile_detail">
            <div class="field photo">
                <img src="../image/<?php echo $now_user_profile_photo ?>" alt="<?php echo $now_user_name ?>">
            </div>
            <div class="field name">
                <p>Your Name: <?php echo $now_user_name ?></p>
            </div>
            <div class="field setting">
                <a href="./action/logout.php">Log Out</a><br>
                <a href="./action/update_account_comfirm.php?account=<?php echo $now_account ?>">Change Profile</a>
            </div>
            <div class="field email">
                <p>Your Email: <?php echo $now_user_email ?></p>
            </div>
            <div class="field num">
                <p>Contact Number: <?php echo $now_contact_num ?></p>
            </div>
            <div class="field id_pass">
                <p>Account ID: <?php echo $now_account ?></p>
                <p>Your Password: <?php echo $now_password ?></p>
            </div>
        </div>
        <div class="order_list">
            <fieldset>
                <legend>Order History</legend>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Account ID</th>
                            <th>Meal ID</th>
                            <th>Order Date</th>
                            <th>Order Time</th>
                            <th>Message</th>
                            <th>State</th>
                        </tr>
                    </thead>
                <?php if($result_order->num_rows > 0){
                    while($row_order = $result_order->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row_order['order_id'] ?></td>
                            <td><?php echo $row_order['account_id'] ?></td>
                            <td><?php echo $row_order['meal_id'] ?></td>
                            <td><?php echo $row_order['order_date'] ?></td>
                            <td><?php echo $row_order['order_time'] ?></td>
                            <td><?php echo $row_order['message'] ?></td>
                            <td><?php echo $row_order['state'] ?></td>
                        </tr>
                    <?php  }}else{ ?>
                        <tr>
                            <td colspan="7">Not Data Found</td>
                        </tr>
                    <?php    }?>
                </table>
            </fieldset>
        </div>
        <div class="appointment_list">
            <fieldset>
                <legend>Appointment History</legend>
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
                        </tr>
                    </thead>
                <?php if($result_appointment->num_rows > 0){
                    while($row_appointment = $result_appointment->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row_appointment['appointment_id'] ?></td>
                            <td><?php echo $row_appointment['account_id'] ?></td>
                            <td><?php echo $row_appointment['cat_id'] ?></td>
                            <td><?php echo $row_appointment['appointment_date'] ?></td>
                            <td><?php echo $row_appointment['appointment_time'] ?></td>
                            <td><?php echo $row_appointment['appointment_people'] ?></td>
                            <td><?php echo $row_appointment['message'] ?></td>
                        </tr>
                    <?php  }}else{ ?>
                        <tr>
                            <td colspan="7">Not Data Found</td>
                        </tr>
                    <?php    }?>
                </table>
            </fieldset>
        </div>
    </main>
    <?php include('./page_all/footer.php') ?>
</body>
</html>
<script src="../javascript/hamburger_menu.js"></script>
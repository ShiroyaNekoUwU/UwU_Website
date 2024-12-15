<?php
include("../../connect.php");
include("../get_data/get_data_account.php");
include("../get_data/get_data_account_id.php");
include("../get_data/get_data_cat_id.php");
include("../get_data/get_data_photo.php");

if(isset($_GET['appointment'])){
    $appointment = $_GET['appointment'];
}else{
    $appointment = 'P0000';
}

$sql_update_appointment = "SELECT * FROM appointment WHERE appointment_id = '$appointment'";
$result_update_appointment = $conn->query($sql_update_appointment);
$row_update_appointment = $result_update_appointment->fetch_assoc();

$old_cat = $row_update_appointment["cat_id"];
$old_appointment_date = $row_update_appointment["appointment_date"];
$old_appointment_time = $row_update_appointment["appointment_time"];
$old_appointment_people = $row_update_appointment["appointment_people"];
$old_message = $row_update_appointment["message"];


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
    <link rel="stylesheet" href="../../stylesheet/style_update.css">
</head>
<body>
    <?php include("../page_all/header_page_action.php"); ?>
    <main>
        <fieldset class="update_box appointment">
            <legend>Update > <?php echo $_GET['appointment'] ?></legend>
                <form action="update_appointment_execute.php?appointment=<?php echo $_GET['appointment']; ?>" method="post">
                <div class="field cat">
                            <label for="cat">Cat:</label><br>
                            <select name="cat" id="cat">
                                <option value="-">-</option>
                                <?php if ($result_cat_id_check->num_rows > 0) {
                                while ($row_cat_id_check = $result_cat_id_check->fetch_assoc()) { ?>
                                    <option value="<?php echo $row_cat_id_check['cat_id']; ?>" <?php if ($row_cat_id_check['cat_id'] == $old_cat) {echo 'selected';} ?>>
                                        <?php echo $row_cat_id_check['cat_id']; ?> <?php echo $row_cat_id_check['cat_name']; ?>
                                    </option>
                                <?php }} ?>
                            </select>
                        </div>
                <div class="field date">
                    <label for="date">Appointment Date:</label><br>
                    <input type="date" id="date" name="date" value="<?php echo $old_appointment_date ?>">
                </div>
                <div class="field time">
                    <label for="time">Appointment Time:</label><br>
                    <input type="time" id="time" name="time" value="<?php echo $old_appointment_time ?>">
                </div>
                <div class="field people">
                    <label for="people">Appointment People Count:</label><br>
                    <input type="number" id="people" name="people" placeholder="<?php echo $old_appointment_people ?>">
                </div>
                <div class="field message">
                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" placeholder="<?php echo $old_message ?>" rows="4" cols="50"></textarea>
                </div>
                <div class="field cancle">
                    <a href="../list_appointment.php">Cancle</a>
                </div>
                <div class="field reset">
                    <input type="reset" name="reset" value="Reset">
                </div>
                <div class="field submit">
                    <input type="submit" name="submit" value="Update">
                </div>
            </form>
        </fieldset>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
<script src="../../javascript/profile_photo_select.js"></script>
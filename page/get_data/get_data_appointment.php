<?php
$sql_appointment = "SELECT * FROM appointment WHERE account_id = '{$now_account}'";
$result_appointment = $conn->query($sql_appointment);
?>
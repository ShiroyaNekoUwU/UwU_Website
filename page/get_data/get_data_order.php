<?php
$sql_order = "SELECT * FROM orders WHERE account_id = '{$now_account}'";
$result_order = $conn->query($sql_order);
?>
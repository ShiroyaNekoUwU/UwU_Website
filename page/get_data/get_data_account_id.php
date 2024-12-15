<?php
$sql_account_id_check = "SELECT account.account_id , user.user_name FROM account JOIN user ON account.user_id = user.user_id ORDER BY account.account_id";
$result_account_id_check = $conn->query($sql_account_id_check);
?>
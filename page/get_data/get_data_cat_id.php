<?php
$sql_cat_id_check = "SELECT cat_id , cat_name FROM cat WHERE state = 'valid' ORDER BY cat_id";
$result_cat_id_check = $conn->query($sql_cat_id_check);
?>
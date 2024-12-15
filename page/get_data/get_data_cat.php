<?php
$sql_cat = "SELECT * FROM cat WHERE state = 'valid' ORDER BY cat_id LIMIT 3";
$result_cat = $conn->query($sql_cat);
?>
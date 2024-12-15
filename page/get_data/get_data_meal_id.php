<?php
$sql_meal_id_check = "SELECT meal_id , meal_name FROM meal WHERE state = 'valid' ORDER BY meal_id";
$result_meal_id_check = $conn->query($sql_meal_id_check);
?>
<?php
$sql_meal = "SELECT * FROM meal WHERE state = 'valid' ORDER BY meal_id LIMIT 3";
$result_meal = $conn->query($sql_meal);
?>
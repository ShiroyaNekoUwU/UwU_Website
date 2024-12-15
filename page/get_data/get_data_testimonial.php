<?php
$sql_testimonial = "SELECT * FROM testimonial WHERE account_id = '{$now_account}'";
$result_testimonial = $conn->query($sql_testimonial);
?>
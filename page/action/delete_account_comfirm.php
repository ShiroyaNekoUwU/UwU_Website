<?php 
include("../../connect.php");
include("../get_data/get_data_account.php");

if(isset($_GET['account'])){
    $account = $_GET['account'];
}else{
    $account = 'B0000';
}

$sql_delete_account = "SELECT * FROM account JOIN user ON account.user_id = user.user_id WHERE account.account_id = '$account'";
$result_delete_account = $conn->query($sql_delete_account);
$row_delete_account = $result_delete_account->fetch_assoc();
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
    <link rel="stylesheet" href="../../stylesheet/style_delete.css">
</head>
<body>
    <?php include("../page_all/header_page_action.php"); ?>
    <main>
        <div class="delete">
            <div class="delete_data">
                <div class="photo">
                    <img src='../../image/<?php echo $row_delete_account['profile_photo'] ?>' alt="<?php echo $row_delete_account['user_name'] ?>">
                </div>
                <div class="name">
                    <h2>Name: <?php echo $row_delete_account['user_name'] ?></h2>
                </div>
                <div class="account">
                    <h2>Account ID: <?php echo $row_delete_account['account_id'] ?></h2>
                </div>
                <div class="user">
                    <h2>User ID: <?php echo $row_delete_account['user_id'] ?></h2>
                </div>
            </div>
            <div class="delete_comfirm">
                <div class="comfirm_cancle">
                    <a href="../list_account.php">Cancle</a>
                </div>
                <div class="comfirm_delete">
                    <a href="delete_account_execute.php?account=<?php echo $row_delete_account['account_id']; ?>">Delete</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../../javascript/hamburger_menu.js"></script>
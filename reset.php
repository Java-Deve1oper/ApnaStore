<?php
session_start();
if ($_SESSION["login_user"] != null) {

    if ($_SESSION['logging'] == 1) {
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>apnaStore : Kuch bhi Kabhi bhi</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="header">
        <a class="logo"><?php echo ucfirst($_SESSION["login_user"]); ?></a>
        <div class="header-right">
            <!-- <a class="active" href="#home">Home</a> -->
            <a href="passwordReset.php">Reset-Password</a>
            <a href="controller/logout.php?>">Logout</a>
        </div>
    </div>
    <!--  Request me for a signup form or any type of help  -->
    <div class="login-form">
        <form action="controller/resetData.php" method="post">
            <h4 class="modal-title">Reset Password</h4>
            <div class="form-group">
                <input type="text" class="form-control" name="oldpassword" placeholder="Old Password" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="newpassword" placeholder="New Password" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="cnfpassword" placeholder="Confirm Password" required="required">
            </div>
            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Reset">
        </form>

    </div>
</body>

</html>



<?php


} else {

    header("location:index.php");
}
} else {

header("location:index.php");
}

?>
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

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <link rel="stylesheet" href="css/login.css">
            <link rel="stylesheet" href="css/header.css">
        </head>

        <body>
            <div class="header">
                <a class="logo"><?php echo ucfirst($_SESSION["login_user"]); ?></a>
                <div class="header-right">
                    <a class="active" href="panel.php">Home</a>
                    <!-- <a href="passwordReset.php">Reset-Password</a> -->
                    <a href="controller/logout.php?>">Logout</a>
                </div>
            </div>
            <!--  Request me for a signup form or any type of help  -->
            <div class="login-form">
                <form action="controller/resetData.php" method="post">
                    <h4 class="modal-title">Reset Password</h4>
                    <div class="form-group">
                        <input type="text" id="old_password" class="form-control" name="oldpassword" placeholder="Old Password" required="required">
                    </div>
                    <span id='ol_message'></span>
                    <div class="form-group">
                        <input type="text" id="password" class="form-control" name="newpassword" onkeyup="CheckPasswordStrength(this.value)" placeholder="New Password" required="required">
                    </div>
                    <span id="password_strength"></span>
                    <span id='message'></span>
                    <div class="form-group">
                        <input type="text" id="cnf_password" class="form-control" name="cnfpassword" placeholder="Confirm Password" required="required">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block btn-lg" value="Reset">
                </form>

            </div>


            <script>
                function CheckPasswordStrength(password) {
                    var password_strength = document.getElementById("password_strength");

                    //TextBox left blank.
                    if (password.length == 0) {
                        password_strength.innerHTML = "";
                        return;
                    }

                    //Regular Expressions.
                    var regex = new Array();
                    regex.push("[A-Z]"); //Uppercase Alphabet.
                    regex.push("[a-z]"); //Lowercase Alphabet.
                    regex.push("[0-9]"); //Digit.
                    regex.push("[$@$!%*#?&]"); //Special Character.

                    var passed = 0;

                    //Validate for each Regular Expression.
                    for (var i = 0; i < regex.length; i++) {
                        if (new RegExp(regex[i]).test(password)) {
                            passed++;
                        }
                    }

                    //Validate for length of Password.
                    if (passed > 8 && password.length > 15) {
                        passed++;
                    }

                    //Display status.
                    var color = "";
                    var strength = "";
                    switch (passed) {
                        case 0:
                        case 1:
                            strength = "Weak";
                            color = "red";
                            break;
                        case 2:
                            strength = "Good";
                            color = "darkorange";
                            break;
                        case 3:
                        case 4:
                            strength = "Strong";
                            color = "green";
                            break;
                        case 5:
                            strength = "Very Strong";
                            color = "darkgreen";
                            break;
                    }
                    password_strength.innerHTML = strength;
                    password_strength.style.color = color;
                }

                $('#password, #cnf_password').on('keyup', function() {

                    if ($('#password').val() != "" && $('#cnf_password').val() != "") {
                        if ($('#password').val() == $('#cnf_password').val()) {
                            $('#message').html('Matched').css('color', 'green');
                            $(':input[type="submit"]').prop('disabled', false);
                        } else {
                            $('#message').html('Not Matching').css('color', 'red');
                            $(':input[type="submit"]').prop('disabled', true);
                        }
                        // $(':input[type="submit"]').prop('disabled', true);
                    }


                });

                $('#password, #old_password').on('keyup', function() {
                    if ($('#password').val() != "" && $('#old_password').val() != "") {
                        if ($('#password').val() != $('#old_password').val()) {
                            $('#ol_message').html('').css('color', 'green');
                            $(':input[type="submit"]').prop('disabled', false);
                        } else {
                            $('#ol_message').html('Old Password & New Password Should Not be matched !!!').css('color', 'red');
                            $(':input[type="submit"]').prop('disabled', true);
                        }
                        $(':input[type="submit"]').prop('disabled', true);
                    }
                });
            </script>
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
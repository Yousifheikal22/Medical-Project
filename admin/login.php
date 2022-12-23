<?php
require_once '../config.php';
require_once BLF.'validate.php';
$mysqli = require_once BLF.'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<style>
    body {
        background-image: url("../assets/images/VxQwGM.jpg");
        background-size: cover;
        /*background-color: #00f0ff;*/
        margin-top: 100px;
    }
</style>
<body>

<?php

    if (isset($_POST['submit'])) {

        $pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_NUMBER_INT);

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if (checkEmpty($pass) && checkEmpty($email))
            if (ValidateEmail($email)) {
                $sql = sprintf("SELECT * FROM admins
                                       WHERE admin_email='%s'",
                                       $mysqli->real_escape_string($_POST["email"]));
                $result = $mysqli->query($sql);
                $user = $result->fetch_assoc();
                if ($user) {
                    if (password_verify($_POST['password'], $user['admin_password'])) {
                        $_SESSION['admin_name'] = $user['admin_name'];
                        sleep(1.5);
                        header("location: http://localhost/jo/medical/admin/");
                    } else {
                        $not_exist_email = 'Failed E-mail or password please try again ';
                    }
                } else {
                    $not_exist_email = 'Sorry this E-mail not exists ';
                }
            } else {
                $not_exist_email = 'Sorry this E-mail not exists ';
            }
        else {
            if (!checkEmpty($pass)) {
                $error_msg_pass = 'Please fill Password ';
            }

            if (!checkEmpty($email)) {
                $error_msg_email = 'Please fill E-mail ';
            }
            $error_msg = "Please fill all fields";
        }
    }
?>

<div class="container">
    <div class="card" >

        <div class= 'login' style="text-align: center;margin-bottom: 15px;color: #607d8b">
            <h2>Login</h2>
        </div>

<!--if data not inserted in Database-->
<?php if(isset($error_msg)){ ?>
<div class="">
    <h3 class="alert alert-danger text-center"> <?php echo $error_msg; ?> <?php }?> </h3>

    <?php if(isset($not_exist_email)){ ?>
    <div class="">
        <h3 class="alert alert-danger text-center"> <?php echo $not_exist_email; ?> <?php }?>  </h3>

        <div class= 'img_container'>
            <img src="<?php echo ASSETS?>images/doc.jpg" alt="" />
        </div>
        <form method="post">

            <label>
                <input type="email" name="email" placeholder="E-mail">
                <?php if(isset($error_msg_email)) {?>
                    <p style="color: red"><?php echo $error_msg_email;?></p>
                <?php }?>

            </label>
            <label>
                <input type="password" name="password" placeholder="password" min= 10 max= 20>
                <?php if(isset($error_msg_pass)) {?>
                    <p style="color: red"><?php echo $error_msg_pass;?></p>
                <?php }?>
            </label>
            <input class="register_button" name="submit" type="submit" value="REGISTER">
        </form>
    </div>
</body>
</html>
<?php
require_once ADMIN.'inc/footer.php';
?>
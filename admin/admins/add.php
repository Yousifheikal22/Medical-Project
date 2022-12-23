<?php
require_once '../../config.php';
//require_once ADMIN.'inc/header.php';
require_once BLF . 'validate.php';
$mysqli = require_once BLF . 'db.php';

?>


<?php

if(isset($_POST['submit']))
{
    $username = filter_input(INPUT_POST, 'username');

    $pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_NUMBER_INT);

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if(checkEmpty($username) && checkEmpty($pass) && checkEmpty($email))
        if(ValidateEmail($email))
        {
            $newPass = password_hash($pass,PASSWORD_DEFAULT);
            $sql = "INSERT INTO admins (admin_name, admin_email, admin_password) VALUES (?, ?, ?)";
            $stmt = $mysqli->stmt_init();
            if(! $stmt->prepare($sql)){
                die("SQL error: ".$mysqli->error);
            }
            $stmt->bind_param("sss",
            $username, $email, $newPass);

            if($stmt->execute()){
                $success_msg = "Data will be inserted in DB";
            }
            else
            {
                die($mysqli->error." ".$mysqli->errno);
            }
        }
        else
        {
            $not_exist_email = 'Sorry this E-mail not exists ';
        }
    else
    {
        if(!checkEmpty($username))
        {
            $error_msg_name = 'Please fill username ';
        }

        if(!checkEmpty($pass))
        {
            $error_msg_pass = 'Please fill Password ';
        }

        if(!checkEmpty($email))
        {
            $error_msg_email = 'Please fill E-mail ';
        }
        $error_msg = "Please fill all fields";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    <link rel="stylesheet" href="<?php echo ASSETS."css/main.css"?>">
    <link rel="stylesheet" href="<?php echo ASSETS."css/main.css" ?>">
    <title>Add Admins</title>
</head>
<style>
    body {
        background-image: url("../../assets/images/medical.jpeg ");
        background-size: cover;
        /*background-color: #00f0ff;*/
        margin-top: 100px;
    }
</style>
<body>
<div class="container">
    <div class="card" >

    <!--if data inserted in Database-->
    <?php if(isset($success_msg)){ ?>
    <div class="">
        <h3 class="alert alert-success text-center"> <?php echo $success_msg; ?> <?php }?>  </h3>

        <!--if data not inserted in Database-->
        <?php if(isset($error_msg)){ ?>
        <div class="">
            <h3 class="alert alert-danger text-center"> <?php echo $error_msg; ?> <?php }?> </h3>

            <?php if(isset($not_exist_email)){ ?>
            <div class="">
                <h3 class="alert alert-success text-center"> <?php echo $not_exist_email; ?> <?php }?>  </h3>

            <div class= 'img_container'>
                <img src="<?php echo ASSETS?>images/doc.jpg" alt="" />
            </div>
            <form method="post">
                <label>
                    <input type="text" name="username" placeholder="Username" min= 10 max= 20>
                    <?php if(isset($error_msg_name)) {?>
                        <p style="color: red"><?php echo $error_msg_name;?></p>
                    <?php }?>
                </label>

                <label>
                    <input type="email" name="email" placeholder="E-mail">
                    <?php if(isset($error_msg_email)) {?>
                        <p style="color: red"><?php echo $error_msg_email;?></p>
                    <?php }?>

                    <?php if(isset($not_exist_email)) {?>
                        <p style="color: red"><?php echo $not_exist_email;?></p>
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
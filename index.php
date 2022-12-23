<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <title>Medical</title>

</head>
<style>
    body {
        background-image: url("assets/images/VxQwGM.jpg");
        background-size: cover;
        /*background-position: center;*/
        width: 100%;
        height: 100vh;
    }

    form div.b1 {
        position: relative;
        text-align: center;
    }

    form div.b1 button.btn-warning{
        position: absolute;
        left: 700px;
        bottom: -420px;
        background-color: #e16a2a9e ;
        color: white;
        width: 250px;
        height: 35px;
    }

    form div.b2 {
        position: relative;
        text-align: center;
    }

    form div.b2 button.btn-warning{
        position: absolute;
        left: 700px;
        bottom: -460px;
        background-color: #e16a2a9e ;
        color: white;
        width: 250px;
        height: 35px;
    }

    form div button.btn-warning a {
        color: white;
        letter-spacing: 20px;
        text-decoration: none;
    }
</style>
<body>

<form>
    <div class="b1">
        <button class="btn-warning"><a href="<?php echo BURL_ORDER?>">Order</a></button>
    </div>
    <div class="b2">
        <button class="btn-warning"><a href="<?php echo BURL_ADMIN?>">Admin</a></button>
    </div>
</form>
</body>
</html>
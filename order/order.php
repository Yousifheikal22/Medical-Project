<?php  require '../config.php';
$mysqli = require_once BLF.'db.php';
require_once BLF.'validate.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple form design</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">-->
<!--    <link rel="stylesheet" href="--><?php //echo ASSETS; ?><!--css/bootstrap.min.css" >-->

</head>
<style>
    body {
        background-image: url("../assets/images/VxQwGM.jpg");
        background-size: cover;
        /*background-position-y: 200px;*/
        background-position: center;
        /*background-color: #00f0ff;*/
        /*margin-top: 100px;*/
    }
</style>
<body>

<?php

if(isset($_POST['submit']))
{
    $service = filter_input(INPUT_POST, 'service', FILTER_SANITIZE_NUMBER_INT);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_SPECIAL_CHARS);

    if(checkEmpty($service) && checkEmpty($city) && checkEmpty($name) && checkEmpty($mobile))
    {
        $sql = "INSERT INTO orders (order_name, order_mobile, order_email, order_notes, order_serv_id, order_city_id)
                VALUES (?,?,?,?,?,? )";

        $stmt = $mysqli->stmt_init();
        if(!$stmt->prepare($sql))
        {
            die("SQL error: ".$mysqli->error);
        }
        $stmt->bind_param("ssssss",
             $name, $mobile, $email, $note, $service, $city);

        if($stmt->execute()){
            $success_msg = "Data will be inserted in DB";
        }
    }
    else
    {
        $error_msg = "Please fill all fields";
    }

}

?>

<div class="container">
    <div class="box">
        <form action="" method="POST">
            <h2>Order Form</h2>

            <?php if(isset($success_msg)){ ?>
            <div class="">
                <h3 class="alert alert-success text-center"> <?php echo $success_msg; ?> <?php }?>  </h3>

            <?php
            $sql = "SELECT * FROM services";
            $result = $mysqli->query($sql);
            ?>
            <label for="serv" class="font-1">Choose Service</label>
            <select  name="service" id="serv" class="form-control font-1">
                <?php while ($user = $result->fetch_assoc())
                {?>
                    <option name="service" value="<?php echo $user['serv_id']." = ".$user['serv_name']?>">
                        <?php echo $user['serv_name']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>

            <?php
            $sql = "SELECT * FROM cities";
            $result = $mysqli->query($sql);
            ?>

            <label for="city" class="font-1">Choose City</label>
            <select  name="city" id="city" class="form-control font-1">
                <?php while ($user = $result->fetch_assoc())
                {?>
                    <option name="city" value="<?php echo $user['city_id']." = ".$user['city_name']?>">
                        <?php echo $user['city_name']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>

            <label >Name </label>
            <label>
                <input type="text" name="name" id="name" placeholder="Username" >
            </label>
            <br>
            <label >Mobile </label>
            <label>
                <input type="text" name="mobile" id="mobile" placeholder="Mobile" >
            </label>

            <br>
            <label>E-mail </label>
            <label>
                <input type="email" name="email" id="email" placeholder="E-mail" >
            </label>
            <br>

            <label>Note </label>
            <label>
                <input style="height: 100px" type="text" name="note" id="note" placeholder="Note...." >
            </label>

            <!--if data not inserted in Database-->
            <?php if(isset($error_msg)){ ?>
            <div class="">
                <h3 class="alert alert-danger text-center"> <?php echo $error_msg; ?> <?php }?> </h3>

            <button type="submit" name="submit" >Submit</button>
        </form>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo ASSETS; ?>js/jquery-3.4.1.min.js" ></script>
<script src="<?php echo ASSETS; ?>js/popper.min.js" ></script>
<script src="<?php echo ASSETS; ?>js/bootstrap.min.js" ></script>
</body>
</html>




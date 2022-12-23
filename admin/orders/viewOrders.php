<?php
require_once '../../config.php';
require_once ADMIN."inc/header.php";
$mysqli = require_once BLF.'db.php';
require_once BLF.'validate.php';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS."css/bootstrap.min.css"?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css">
    <title>Dashboard | Home Page</title>
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

<div class="p-5">
    <h3 class="text-center p-3 bg-info text-white">View All Cities</h3>
    <table class="table table-dark table-bordered">
        <thead>
        <tr class="text-center">
            <th scope="col">#ID</th>
            <th scope="col">Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">E-mail</th>
            <th scope="col">Notes</th>
            <th scope="col">order_serv_id</th>
            <th scope="col">order_city_id</th>
            <th scope="col">Timestamp</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM orders";
        $result = mysqli_query($mysqli, $sql);
        while ($row=mysqli_fetch_array($result))
        {
            ?>
            <tr>
                <td class="text-center"> <?php echo $row['order_id'];?> </td>
                <td class="text-center"> <?php echo $row['order_name'];?> </td>
                <td class="text-center"> <?php echo $row['order_mobile'];?> </td>
                <td class="text-center"> <?php echo $row['order_email'];?> </td>
                <td class="text-center"> <?php echo $row['order_notes'];?> </td>
                <td class="text-center"> <?php echo $row['order_serv_id'];?> </td>
                <td class="text-center"> <?php echo $row['order_city_id'];?> </td>
                <td class="text-center"> <?php echo $row['order_created_at'];?> </td>

                <td class="text-center">
                    <a onclick="if(!confirm('Do you want to edit this field ?'))return false;"
                       href="" class="btn btn-info">Edit</a>

                    <a onclick="if(!confirm('Do you want to delete this field ?'))return false;"
                       href="" class="btn btn-danger delete">Delete</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
<?php
require_once ADMIN.'inc/footer.php';
?>

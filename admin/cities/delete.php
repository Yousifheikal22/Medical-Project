<?php
require_once '../../config.php';
$mysqli = require_once BLF.'db.php';
//require_once ADMIN."inc/header.php";

?>

<?php
if(isset($_GET['id']) && is_numeric($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM cities WHERE `city_id`='$id'";
    $result = mysqli_query($mysqli, $sql);
    $row=mysqli_fetch_array($result);

    if($_GET['id'] === $row['city_id'])
    {
    if(isset($_POST['submit']))
    {
        $sql = "DELETE FROM cities WHERE city_id=?";
        $stmt = $mysqli->stmt_init();
        if (!$stmt->prepare($sql)) {
            die("SQL error :" . $mysqli->error);
        }
        $stmt->bind_param('s', $id);
        if ($stmt->execute()) {
            sleep(0.4);
//            $success_msg = "Deleted Completed";
            header("location:".BURL_EDIT);
    }
    else
    {
    $error_msg = "Please fill Name of city";
    }
    }
    }
    else
    {
    header("location:".BURL_ADMINS);
    }
}
else
{
header("location:".BURL_ADMINS);
}
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
        <link rel="stylesheet" href="style.css">
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

<div class="col-sm-6 offset-sm-3 p-3 bg-dark bg-opacity-75 border border-dark p-5">
    <?php if(isset($error_msg)){ ?>
    <div class="">
        <h3 class="alert alert-danger text-center"> <?php echo $error_msg; ?> <?php }?> </h3>

        <?php if(isset($success_msg)){ ?>
        <div class="">
            <h3 class="alert alert-info text-center"> <?php echo $success_msg; ?> <?php }?> </h3>

            <h3 class="text-center p-3 bg-primary text-white">Delete City</h3>
            <form method="post" action="" >
                <div class="form-group">
                    <label style="color:white;background: #383d41;font-size: large;font-style: italic" >ID Of City</label>
                    <label >
                        <input type="number" name="number" value="<?php echo $row['city_id']?>" class="form-control" >
                    </label>
                    <input type="hidden" name="city_id" value="" class="form-control" >
                </div>

                <button type="submit" name="submit" class="btn btn-success">Delete</button>
            </form>

        </div>


</body>
</html>
<?php
require_once ADMIN.'inc/footer.php';
?>



<?php
if(!isset($_SESSION['admin_name']))
{
    header("location:http://localhost/jo/medical/admin/login.php");
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
    <link rel="stylesheet" href="main.css">
    <title>Dashboard | Home Page</title>
</head>
<body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href=""> <img src="<?php echo ASSETS."images/logo.png"?>" width="50" alt="LOGO"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BURL_ADMINS?>">Home</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cities
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" onclick="if(!confirm('Do you want to Add new city ?'))return false;"
                       href="http://localhost/jo/medical/admin/cities/addcity.php">Add</a>
                    <a class="dropdown-item" onclick="if(!confirm('Do you want to View all cities ?'))return false;"
                       href="http://localhost/jo/medical/admin/cities/viewcities.php">View All</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Services
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" onclick="if(!confirm('Do you want to Add new services ?'))return false;"
                       href="<?php echo BURL_ADMINS."/services/addServices.php"?>">Add</a>

                    <a class="dropdown-item" onclick="if(!confirm('Do you want to View all services ?'))return false;"
                       href="<?php echo BURL_ADMINS."/services/viewServices.php"?>">View All</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Orders
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" onclick="if(!confirm('Do you want to View all orders ?'))return false;"
                       href="<?php echo BURL_ADMINS."/orders/viewOrders.php"?>">View All</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admins
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" onclick="if(!confirm('Do you want to Add new admin ?'))return false;"
                       href="<?php echo BURL_ADMINS."/admins/add.php"?>">Add</a>

                    <a class="dropdown-item" onclick="if(!confirm('Do you want to Add new admin ?'))return false;"
                       href="<?php echo BURL_ADMINS."/admins/ViewAdmins.php"?>">View All</a>
                </div>
            </li>


            <li class="nav-item ">
                <a class="nav-link" href="http://localhost/jo/medical" target="_blank">View Site</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" onclick="if(!confirm('Do you want to logout this control panel ?'))return false;"
                   href="http://localhost/jo/medical/admin/logout.php">Logout</a>
            </li>

        </ul>


    </div>
</nav>

<div class="container-fluid mt-5 mb-5">
    <div class="row">

<!--<div class="welcome"">-->
<!--    <h2 class="admin">Welcome --><?php //echo $_SESSION['admin_name']?><!--</h2>-->
<!--    <p>This page is control panel</p>-->
<!--</div>-->
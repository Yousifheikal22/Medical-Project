<?php
session_start();
session_destroy();
sleep(0.9);
header("location:http://localhost/jo/medical/admin/login.php");
exit;
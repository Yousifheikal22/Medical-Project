<?php

$host = 'localhost';
$dbname = 'medical_serv';
$username = 'root';
$password = '';

$mysqli = new mysqli($host, $username, $password, $dbname);

if($mysqli->errno)
{
   die('Connect error : ' .mysqli_connect_error());
}

function getRows($table)
{
    global $conn;
    $sql = "SELECT * FROM `$table` ";

    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        echo mysqli_error($conn);
    }
    $rows = [];
    if(mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row;
        }
    }
    return $rows;
}


function deleteRow($sql)
{
    global $mysqli;
    $result = mysqli_query($mysqli, $sql);

    if ($result)
    {
        return "Deleted Success";
    }
    return false;
}
return $mysqli;
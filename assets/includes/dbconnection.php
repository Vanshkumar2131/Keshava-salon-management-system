<?php

$host = "srv1274.hstgr.io";
$user = "u830888577_AKSMS";
$pass = "Keshava2024";
$db = "u830888577_KSMS";

$con = mysqli_connect($host, $user, $pass, $db);
if (!$con) {
    die('Error: ' . mysqli_connect_error());
}

?>


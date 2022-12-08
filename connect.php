<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "travel";
$con = mysqli_connect($server, $user, $password, $db);

if (!$con) {
    echo "<script>";
    echo "alert('No Connection')";
    echo "</script>";
}

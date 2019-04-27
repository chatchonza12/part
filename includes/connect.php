<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "part";

$conn = mysqli_connect($host,$user,$pass,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
date_default_timezone_set('Asia/Bangkok');

?>
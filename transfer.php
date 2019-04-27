<?php 
session_start();
include("includes/connect.php");

$userid = $_REQUEST["userid"];
$bank_name = $_REQUEST["bank"];
$timez = $_REQUEST["timetran"];
$notes = $_REQUEST["note"];

$sql = "INSERT INTO transfers (transfer_memberid, transfer_bank, transfer_time, transfer_note)
        VALUES ('".$userid."', '".$bank_name."', '".$timez."' , '".$notes."')";
if ($conn->query($sql) === TRUE) {
    echo "แจ้งโอนสำเร็จ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("location:./");

$conn->close();        
?>
<?php

include('./template/connection.php');
$id = $_GET["id"];

$sql = "DELETE FROM members WHERE member_id = $id";

if (mysqli_query($conn, $sql)) {
    header('Location: manager_customer.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>
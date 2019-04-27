<?php

include('../function/connection.php');
$id = $_GET["id"];

$sql = "DELETE FROM course WHERE course_id = $id";

if (mysqli_query($conn, $sql)) {
    header('Location: manager_course.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>
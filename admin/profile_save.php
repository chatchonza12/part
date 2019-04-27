<?php 

session_start();
include('./template/connection.php');
$id = $_SESSION['member_id'];

$sql = "UPDATE members SET 
			member_name = '".$_POST["name"]."' ,
			member_surname = '".$_POST["surname"]."' ,
            member_address = '".$_POST["address"]."' ,
            member_phone = '".$_POST["phone"]."' ,
            member_gender = '".$_POST["gender"]."'";
            $query1	= mysqli_query($conn, $sql);

            $fileinfo=PATHINFO($_FILES["filUpload"]["name"]);
            $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
            move_uploaded_file($_FILES["filUpload"]["tmp_name"],"avatar/" . $newFilename);
            $location="avatar/" . $newFilename;

            mysqli_query($conn,"UPDATE members SET member_img ='$location' WHERE member_id = '".$_SESSION['member_id']."'");
            header("location:./manager_customer.php");

?>
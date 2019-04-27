<?php
	session_start();
	include("includes/connect.php");
	$strSQL = "SELECT * FROM members 
    WHERE member_user = '".mysqli_real_escape_string($conn,$_POST['txtUsername'])."' 
	and member_pass = '".mysqli_real_escape_string($conn,$_POST['txtPassword'])."'";
	$objQuery = mysqli_query($conn,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["member_id"] = $objResult["member_id"];
			$_SESSION["member_role"] = $objResult["member_role"];

			session_write_close();
			
			if($objResult["member_role"] == "admin")
			{
				header("location:./admin/manager_dog.php");
			}
			else
			{
				header("location:./coures/");
			}
	}
	mysqli_close($conn);
?>
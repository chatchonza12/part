<?php
	session_start();
    include("includes/connect.php");
    
        $strSQL = "SELECT * FROM members WHERE member_id = '".$_SESSION['member_id']."' ";
        $objQuery = mysqli_query($conn,$strSQL);
        $row = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

        $name = $row["member_name"].$row["member_surname"];
        $address = $row["member_address"];
        $email = $row["member_email"];
        $phone = $row["member_phone"];
        $total_qty = $_REQUEST["total_qty"];
        $total = $_REQUEST["total"];
        $user_ids = $_REQUEST["user_id"];
        $date = Date("Y-m-d G:i:s");
        
        mysqli_query($conn, "BEGIN"); 
        $sql1	= "INSERT INTO orders values(null, '$name', '$address', '$email', '$phone', '$total_qty', '$total', '$user_ids', '$date')";
        $query1	= mysqli_query($conn, $sql1);

        $sql2 = "select max(order_id) as o_id from orders where order_name='$name' and order_email='$email' and order_date='$date' ";
        $query2	= mysqli_query($conn, $sql2);
        $row = mysqli_fetch_array($query2);
        $o_id = $row["o_id"];
    //PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
        foreach($_SESSION['cart'] as $products_id=>$qty)
        {
            $sql3	= "SELECT * FROM products WHERE products_id=$products_id";
            $query3	= mysqli_query($conn, $sql3);
            $row3	= mysqli_fetch_array($query3);
            $total	= $row3['products_price']*$qty;
            
            $sql4	= "insert into order_detail values(null, '$o_id', '$products_id', '$qty', '$total')";
            $query4	= mysqli_query($conn, $sql4);
        }
        
        if($query1 && $query4){
            mysqli_query($conn, "COMMIT");
            $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
            foreach($_SESSION['cart'] as $p_id)
            {	
                //unset($_SESSION['cart'][$p_id]);
                unset($_SESSION['cart']);
            }
        }
        else{
            mysqli_query($conn, "ROLLBACK");  
            $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
        }

?>

<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='./';
</script>
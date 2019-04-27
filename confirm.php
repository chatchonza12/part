<?php
	session_start();
    include("includes/connect.php"); 
?>

<!DOCTYPE html>
<html lang="th">
<head>
<?php include("includes/common.php");?>
</head>
<body>
<?php include("includes/menu.php");?>
<div class="container">
    <div class="main">
        <form action="save_order.php" method="post">
            <blockquote class="blockquote text-center">ยืนยันการสั่งชื้อ</blockquote>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" align="center">ลำดับ</th>
                        <th scope="col" align="center">สินค้า</th>
                        <th scope="col" align="center">ราคา</th>
                        <th scope="col" align="center">จำนวน</th>
                        <th scope="col" align="center">รวม / รายการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                    $total = 0;
                    if(!empty($_SESSION['cart'])) {
                        foreach($_SESSION['cart'] as $products_id=>$qty){
                            $sql = "SELECT * FROM products WHERE products_id = $products_id";
                            $query = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($query);
                            $sum = $row['products_price'] * $qty;
                            $total += $sum;
                            @$i = $i + 1;
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row["products_name"]."</td>";
                            echo "<td>".number_format($row["products_price"],2)."</td>";
                            echo "<td>".$qty."</td>";
                            echo "<td style='color:#d9272e'>".number_format($sum,2)."</td>";
                            echo "</tr>";
                        }
                        echo "<tr>";
                        echo "<td colspan='4' style='color:#FFFFFF' bgcolor='#343a40' align='center'><b>ราคารวม</b></td>";
                        echo "<td align='right' style='color:#FFFFFF'bgcolor='#343a40'>"."<b>".number_format($total,2)." บาท</b>"."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a href="./" class="btn btn-dark"><i class="fas fa-caret-left"></i>  กลับไปหน้าตะกร้าสินค้า</a>
            <div class="float-right">
                <input type="hidden" name="total_qty" value="<?php echo $qty ;?>">
                <input type="hidden" name="total" value="<?php echo $total ;?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION["member_id"];?>">
                <button type="submit" class="btn btn-success"><i class="fas fa-money-check-alt"></i> สั่งสินค้า</button>     
            </div>
        </form>
    </div>
</div>

</body>
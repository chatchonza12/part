<?php
session_start();
include("includes/connect.php");
require_once __DIR__ . '/vendor/autoload.php';
    $id = $_SESSION["member_id"];
    $sql = "SELECT * FROM orders
            INNER JOIN order_detail ON orders.order_id = order_detail.detail_order
            INNER JOIN members ON orders.order_memberid = members.member_id
            INNER JOIN products ON order_detail.detail_product = products.products_id
            WHERE members.member_id = '".$id."'";
    $result = $conn->query($sql);
    $results = $conn->query($sql);
    $rows = $results->fetch_assoc();

ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/common.php");?>
</head>
<body>

<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ชื่อสินค้า</th>
      <th scope="col">จำนวน</th>
      <th scope="col">ราคา / รายการ</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){ ?>
    <tr>
      <th scope="row"><?php @$i = $i + 1; echo $i;?></th>
      <td><?php echo $row["products_name"]; ?></td>
      <td><?php echo $row["detail_qty"]; ?></td>
      <td><?php echo $row["products_price"]; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

</body>
</html>

<?Php
$html = ob_get_contents();
ob_end_clean();
$mpdf = new \Mpdf\Mpdf('th', 'A4-L', '0', 'garuda');
$mpdf->SetAutoFont();
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html, 2);
$mpdf->Output();
?>     
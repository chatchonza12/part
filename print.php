<?php 
    session_start();
    include("includes/connect.php");
    $id = $_SESSION["member_id"];
    $sql = "SELECT * FROM orders
            INNER JOIN order_detail ON orders.order_id = order_detail.detail_order
            INNER JOIN members ON orders.order_memberid = members.member_id
            INNER JOIN products ON order_detail.detail_product = products.products_id
            WHERE members.member_id = '".$id."'";
    $result = $conn->query($sql);
    $results = $conn->query($sql);
    $rows = $results->fetch_assoc();
    while($row = $result->fetch_assoc()){
        $name = $row["products_name"];
        $qty = $row["detail_qty"];
        $price = $row["products_price"];
    }

    ?>
    <style>
        .container {
            font-family: "Garuda";
            font-size: 12pt;
        }
    </style>

<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$html = '
<div class="container">
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
    <tr>
      <th scope="row"></th>
      <td>"'.$name.'"</td>
      <td>"'.$qty.'"</td>
      <td>"'.$price.'"</td>
    </tr>
  </tbody>
</table>
</div>
';
$mpdf->WriteHTML($html);
$mpdf->Output();
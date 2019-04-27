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
    $row_cnt = $result->num_rows;
    while($row = $result->fetch_assoc()){
        $name = $row["products_name"];
        $qty = $row["detail_qty"];
        $price = $row["products_price"];
    }
    $sum = 0;
    for ($i=1; $i < $row_cnt; $i++) { 
        $sum = $sum + $i;
    }

    ?>

<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$html = '
    <style>
        body {
            font-family: "Garuda";
            font-size: 12pt;
        }
    </style>
<div class="container">
<table class="table table-bordered" border="1" style="width:100%">
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
    while($row = $result->fetch_assoc()){
      <th scope="row">'.$row["products_name"].'</th>
      <td>'.$name.'</td>
      <td>'.$qty.'</td>
      <td>'.$price.'</td>
    </tr>
  </tbody>
</table>
</div>
';
$mpdf->WriteHTML($html);
$mpdf->Output();
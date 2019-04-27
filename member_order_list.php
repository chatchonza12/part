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
    $rows = $results->fetch_assoc()
    ?>
<html lang="th">
<head>
    <?php include("includes/common.php");?>
</head>
<body>
    <?php include("includes/menu.php");?>

<div class="container">
    <div class="main">
    <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ชื่อสินค้า</th>
      <th scope="col">จำนวน</th>
      <th scope="col">ราคา / รายการ</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){ ?>
    <tr>
      <th scope="row"><?php @$i = $i + 1; echo $i;?></th>
      <td><?php echo $row["products_name"]; ?></td>
      <td><?php echo $row["detail_qty"]; ?></td>
      <td><?php echo $row["products_price"]; ?></td>
      <td style="color:#d9272e">ยังไม่ได้ชำระ</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    <a href="./" class="btn btn-dark"><i class="fas fa-caret-left"></i>  กลับไปหน้าแรก</a>
    <div class="float-right"></div>
    <hr>

    <div class="row">
        <div class="col-6">
            <form method="post" action="transfer.php">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" value="<?php echo $rows["member_name"]; ?>" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" class="form-control" value="<?php echo $rows["member_surname"]; ?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>ธนาคาร</label>
                    <select class="form-control" name="bank">
                    <option value="ไทยพาณิชย์">ไทยพาณิชย์</option>
                    <option value="กสิกรไทย">กสิกรไทย</option>
                    </select>
                </div>

                <div class="form-group">
                        <label>เวลาที่โอน</label>
                        <input type="text" class="form-control" value="" name="timetran">
                </div>

                <div class="form-group">
                    <label>หมายเหตุ</label>
                    <textarea class="form-control" name="note" rows="2"></textarea>
                </div>
                <input type="hidden" class="form-control" value="<?php echo $id;?>" name="userid">
                <button type="submit" class="btn btn-primary btn-block">แจ้งการโอน</button>
            </form>
        </div>
        <div class="col-6">
        <b>ธนาคารไทยพาณิชย์</b><br>
        เลขที่บัญชี : 123-123456-4564<br>
        <b>ธนาคารกสิกรไทย</b><br>
        เลขที่บัญชี : 123-123456-4564<br>

        </div>
    </div>



    </div>
</div>
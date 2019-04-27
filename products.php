    <?php 
    session_start();
    include("includes/connect.php");
    $id = $_GET["id"];
        $sql = "SELECT * FROM products 
                INNER JOIN category ON products.products_category = category.category_id WHERE products_id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc()
        
    ?>
<html lang="th">
<head>
    <?php include("includes/common.php");?>
</head>
<body>
    <?php include("includes/menu.php");?>

<div class="container">
    <div class="main">
    <div class="row">
        <div class="col-10">
            <h2 style="padding:10px"><?php echo $row["products_name"]; ?></h2>
        </div>
        <div class="col-2">
            <h2 style="padding:10px"><a href="/course" class="btn btn-danger float-right">ย้อนกลับ</a></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-5">
            <img src="./admin/images/<?php echo $row["products_img"];?>" alt="..." class="img-thumbnail" style="margin-bottom: 10px;"><br>
            <a href="products_cart.php?id=<?php echo $row["products_id"]; ?>&action=add" class="btn btn-success btn-block btn-lg"><i class="fas fa-shopping-cart"></i> เพิ่มลงรถเข็น</a>
        </div>
        <div class="col-7">
            <a href="#" class="color-red d-inline-block fs-30 font-weight-bold underline flaot-left" data-id="1"> ราคา </a> <h2>฿ <?php echo number_format($row["products_price"],2); ?></h2><br>
            <a href="#" class="color-red d-inline-block fs-30 font-weight-bold underline" data-id="1"> รายละเอียดคอร์ส </a><br><br>
            <?php echo nl2br(stripslashes($row["products_detail"])); ?>
        </div>
    </div>

    </div>
</div>
</body>
</html>
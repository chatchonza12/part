<?php 
    session_start();
    include("includes/connect.php");
    $id = $_GET["id"];
    ?>
<html lang="th">
<head>
    <?php include("includes/common.php");?>
</head>
<body>
    <?php include("includes/menu.php");?>

<div class="container">
    <div class="main">
        <?php 
        $sql = "SELECT * FROM products 
                INNER JOIN category ON products.products_category = category.category_id
                WHERE category_id = $id";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
        ?>
        <div class="item col-12 col-lg-6 col-xl-4 px-4 mb-4" style="float:left;">
            <div class="row">
                <a href="products.php?id=<?php echo $row["products_id"];?>" class="col">
                    <div class="row">
                        <div class="col-12 px-0 pb-3 bg-grey">
                        <img src="./admin/<?php echo $row["products_img"];?>" class="w-100">
                            <div class="row py-3 px-3"> 
                                <h5 class="col-12 my-0 font-weight-bold line-height-1"><?php echo $row["category_name"];?></h5>
                                <div class="col-12 font-weight-bold line-height-1"><?php echo $row["products_name"];?></div>
                            </div>
                            <div class="row px-2 mx-0 price">
                                <div class="col-3 px-0"> <div href="#" target="_self" class="btn-grey"> สั่งชื้อ </div> </div>
                                <div class="col-9 px-0 text-right color-red fs-30 line-height-1"> 
                                    <div class="price-box price-final_price" data-role="priceBox" data-product-id="15859" data-price-box="product-id-15859"> 
                                        <span class="price-container price-final_price tax weee"> 
                                            <span id="product-price-15859" data-price-amount="150" data-price-type="finalPrice" class="price-wrapper ">
                                                <span class="price">฿<?php echo $row["products_price"];?></span>
                                            </span> 
                                        </span> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php } ?>
        
        <div style="clear:both;"></div>
        

    </div><!-- ปิด main --> 
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</body>
</html>
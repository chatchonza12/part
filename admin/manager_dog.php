
  <?php include('template/admin_header.php');?>
  <?php 

if(isset($_POST['submit_dog'])){ 
    if (!empty($_POST['products_name'])) {
        $products_name = $_POST['products_name'];
        $products_category = $_POST['products_category'];
        $products_detail = $_POST['products_detail'];
        $products_price = $_POST['products_price'];

            $fileinfo=PATHINFO($_FILES["filUpload"]["name"]);
            $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
            move_uploaded_file($_FILES["filUpload"]["tmp_name"],"avatar/" . $newFilename);
            $location="avatar/" . $newFilename;


        $sql = "INSERT INTO products (products_name, products_detail , products_price , products_category , products_img) VALUES ('".$products_name."','".$products_detail."','".$products_price."','".$products_category."','".$location."')";
        $query = mysqli_query($conn,$sql);
        
        header('Location: manager_dog.php');
        exit;    
    }
}

?>

<body id="page-top">

 <?php include('template/admin_menu.php');?>
 
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="admin.php">ระบบขายคอร์สออนไลน์</a>
          </li>
          <li class="breadcrumb-item">จัดการสินค้า</li>
          <li class="breadcrumb-item active"><i class="fas fa-plus-square"></i> จัดการคอสเรียน </li>
        </ol>
        
		<div class="">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addproducts"><i class="fas fa-plus-square"></i> เพิ่มคอร์สเรียน</a>
        <table class="table" style="margin-top:15px">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ลำดับ</th>
              <th scope="col">ชื่อสินค้า</th>
              <th scope="col">ประเภท</th>
              <th scope="col">ราคา</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php
                $sql_category = "SELECT * FROM products INNER JOIN category ON products.products_category = category.category_id";
                $result = $conn->query($sql_category); 
                if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <th scope="row"><?php echo $row["products_id"]; ?></th>
              <td><?php echo $row["products_name"]; ?></td>
              <td><?php echo $row["category_name"]; ?></td>
              <td><?php echo $row["products_price"]; ?></td>
              <td width="20%">
                <div class="btn-group btn-block" role="group" aria-label="Basic example">
                    <a href="manager_dog_edit.php?id=<?php echo $row["products_id"]; ?>" class="btn btn-warning"><i class="fas fa-pen-square"></i> แก้ไข</a>
                    <a href="manager_dog_delete.php?id=<?php echo $row["products_id"]; ?>" class="btn btn-danger"><i class="fas fa-minus-square"></i> ลบ</a>
                </div>
             </td>
            </tr>
            <?php 
            } } else {
                echo "0 Result";
            } 
            ?>
          </tbody>
        </table>
        </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Modal -->
<div class="modal fade" id="addproducts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">เพิ่มคอร์สเรียน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form name="addproducts" method="post">
        <div class="form-group">
            <label for="">ชื่อสินค้า</label>
            <input type="text" class="form-control" id="" placeholder="" name="products_name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">ประเภทคอร์สเรียน</label>
            <select class="form-control" id="" name="products_category">
            <option value="1">วิทยาศาสตร์</option>
            <option value="2">คณิตศาสตร์</option>
            </select>
        </div>
        <div class="form-group">
          <label>รายละเอียด</label>
          <textarea class="form-control" name="products_detail" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="">ราคา</label>
            <input type="text" class="form-control" id="" placeholder="" name="products_price">
        </div>
        <div class="custom-file">
                    <input type="file" class="custom-file-input" name="filUpload" id="customFile">
                    <label class="custom-file-label"for="customFile">Choose file</label>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary" name="submit_dog"><i class="fas fa-plus-square"></i> เพิ่มคอร์สเรียน</button>
      </div>
      </form>

    </div>
  </div>
</div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin.min.js"></script>
  

</body>
<?php mysqli_close($conn); ?>
</html>

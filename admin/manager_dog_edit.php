
  <?php include('template/admin_header.php');?>
          <?php
                $id = $_GET['id'];
                $sql_category = "SELECT * FROM products INNER JOIN category ON products.products_category = category.category_id WHERE products.products_id = '".$id."'";
                $result = $conn->query($sql_category); 
                $row = mysqli_fetch_assoc($result);

                if(isset($_POST['submit_dog'])){ 
                  if (!empty($_POST['products_name'])) {  
                      $products_name = $_POST['products_name'];
                      $products_category = $_POST['products_category'];
                      $products_detail = $_POST['products_detail'];
                      $products_price = $_POST['products_price'];

                      $fileinfo=PATHINFO($_FILES["filUpload"]["name"]);
                      $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
                      move_uploaded_file($_FILES["filUpload"]["tmp_name"],"images/" . $newFilename);
                      $location="images/" . $newFilename;
              
                      $sql2 = "UPDATE products SET products_name = '".$products_name."' , products_category = '".$products_category."',products_detail = '".$products_detail."' ,  products_price = '".$products_price."' ,  products_price = '".$products_price."' , products_img = '".$location."'  WHERE products_id = '".$id."' ";
                      if (mysqli_query($conn, $sql2)) {
                        header('Location: manager_dog.php');
                        exit;  
                      }  
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
            <a href="admin.php">ระบบจัดการสินค้า</a>
          </li>
          <li class="breadcrumb-item">จัดการสินค้า</li>
          <li class="breadcrumb-item active"><i class="fas fa-plus-square"></i> แก้ไขสมาชิก :</li>
        </ol>
        
		<div class="container">
        	<div class="justify-content-md-center ">
            <form name="edit_course" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="">ลำดับ</label>
                    <input type="text" class="form-control" id="" placeholder="" disabled value="<?php echo $row["products_id"]; ?>">
                </div>
                <div class="form-group">
                    <label for="">ชื่อสินค้า</label>
                    <input type="text" class="form-control" id="" placeholder="ใส่รหัสผ่าน" value="<?php echo $row["products_name"]; ?>" name="products_name">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">ประเภทสุนัข</label>
                  <select class="form-control" id="" name="products_category">
                  <option value="1">พันธุ์ปอมเมอเรเนียน</option>
                  <option value="2">พันธุ์ชิวาว่า</option>
                  <option value="3">พันธุ์ชิสุ</option>
                  <option value="4">พันธุ์ไซบีเรีย</option>
                  <option value="5">พันธุ์โกลเดินริทรีฟเวอร์</option>
                  </select>
              </div>
              <div class="form-group">
              <label>รายละเอียด</label>
                  <textarea class="form-control" name="products_detail" rows="3"><?php echo $row["products_detail"]; ?></textarea>
              </div>
              <div class="form-group">
                  <label for="">ราคา</label>
                  <input type="text" class="form-control" id="" placeholder="" name="products_price" value="<?php echo $row["products_price"]; ?>">
              </div>
              <div class="form-group custom-file">
                        <input type="file" class="custom-file-input" name="filUpload" id="customFile">
                        <label class="custom-file-label"for="customFile">Choose file</label>
              </div>
                <button type="submit" class="btn btn-warning btn-block" name="submit_dog"><i class="fas fa-pen-square"></i> แก้ไขสินค้า</button>
            </form>

           </div>
		</div>
        
        
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

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>
<?php mysqli_close($conn); ?>
</html>

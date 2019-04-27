
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
            move_uploaded_file($_FILES["filUpload"]["tmp_name"],"images/" . $newFilename);
            $location==$newFilename;


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
            <a href="admin.php">ระบบขายสุนัข</a>
          </li>
          <li class="breadcrumb-item">แจ้งการโอนเงิน</li>
          <li class="breadcrumb-item active"><i class="fas fa-plus-square"></i> แจ้งการโอน </li>
        </ol>
        
		<div class="">
        
        <table class="table" style="margin-top:15px">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ลำดับ</th>
              <th scope="col">ชื่อลูกค้า</th>
              <th scope="col">ธนาคาร</th>
              <th scope="col">เวลาการโอน</th>
            </tr>
          </thead>
          <tbody>
          <?php
                $sql_category = "SELECT * FROM transfers INNER JOIN members ON transfers.transfer_memberid = members.member_id";
                $result = $conn->query($sql_category); 
                if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <th scope="row"><?php echo $row["transfer_id"]; ?></th>
              <td><?php echo $row["member_name"]; ?></td>
              <td><?php echo $row["transfer_bank"]; ?></td>
              <td><?php echo $row["transfer_time"]; ?></td>
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

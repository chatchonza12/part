
  <?php include('template/admin_header.php');?>
          <?php
                $id = $_GET['id'];
                $sql_category = "SELECT * FROM products INNER JOIN category ON products.products_category = category.category_id WHERE products.products_id = '".$id."'";
                $result = $conn->query($sql_category); 
                $row = mysqli_fetch_assoc($result);

                if(isset($_POST['submit_course'])){ 
                  if (!empty($_POST['course_name'])) {  
                      $course_name = $_POST['course_name'];
                      $course_category = $_POST['course_category'];
                      $course_section = $_POST['course_section'];
                      $course_age = $_POST['course_age'];
                      $course_price = $_POST['course_price'];
              
                      $sql2 = "UPDATE course SET course_name = '".$course_name."' , course_category = '".$course_category."',course_section = '".$course_section."' ,  course_age = '".$course_age."' ,  course_price = '".$course_price."' WHERE course_id = '".$id."' ";
                      if (mysqli_query($conn, $sql2)) {
                        header('Location: manager_course.php');
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
            <a href="admin.php">FITWHEY</a>
          </li>
          <li class="breadcrumb-item">จัดการสินค้า</li>
          <li class="breadcrumb-item active"><i class="fas fa-plus-square"></i> แก้ไขสมาชิก :</li>
        </ol>
        
		<div class="container">
        	<div class="justify-content-md-center ">
            <form name="edit_course" method="post">
            <div class="form-group">
                    <label for="">ลำดับ</label>
                    <input type="text" class="form-control" id="" placeholder="" disabled value="<?php echo $row["course_id"]; ?>">
                </div>
                <div class="form-group">
                    <label for="">ชื่อคอร์สเรียน</label>
                    <input type="text" class="form-control" id="" placeholder="ใส่รหัสผ่าน" value="<?php echo $row["course_name"]; ?>" name="course_name">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">ประเภทคอร์สเรียน</label>
                  <select class="form-control" id="" name="course_category">
                  <option value="1">PERSONAL TRAINING</option>
                  <option value="2">PHYSIOTHERAPY SERVICE</option>
                  <option value="3">PERSONAL TRAINER CERTIFICATION</option>
                  </select>
              </div>
                <div class="form-group">
                    <label for="">เทรนเนอร์</label>
                    <input type="text" class="form-control" id="" placeholder="" value="<?php echo $row["course_session"]; ?>" name="course_section">
                </div>

                <div class="form-group">
                    <label for="">อายุคอร์ส</label>
                    <input type="text" class="form-control" id="" placeholder="" value="<?php echo $row["course_age"]; ?>" name="course_age">
                </div>

                <div class="form-group">
                    <label for="">ราคา</label>
                    <input type="text" class="form-control" id="" placeholder="" value="<?php echo $row["course_price"]; ?>" name="course_price">
                </div>
                <button type="submit" class="btn btn-warning btn-block" name="submit_course"><i class="fas fa-pen-square"></i> แก้ไขสมาชิก</button>
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

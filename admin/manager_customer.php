
<?php include('template/admin_header.php');?>

<?php 

if(isset($_POST['submit_customer'])){ 
    if (!empty($_POST['username'])) {
      
        $username = $_POST['username'];
        $password = $_POST['password'];
        $namea = $_POST['namea'];
        $nameb = $_POST['nameb'];
        $role = $_POST['role'];

        $sql = "INSERT INTO members (member_name,member_surname,member_user,member_pass,member_role) 
        VALUES ('".$namea."','".$nameb."','".$username."','".$password."','".$role."')";
        $query = mysqli_query($conn,$sql);
        header('Location: manager_customer.php');
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
            <a href="admin.php">ระบบคอร์สออนไลน์</a>
          </li>
          <li class="breadcrumb-item">จัดการสินค้า</li>
          <li class="breadcrumb-item active"><i class="fas fa-plus-square"></i> จัดการสมาชิก </li>
        </ol>
        
		<div class="">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addproducts"><i class="fas fa-plus-square"></i> เพิ่มสมาชิก</a>
        <table class="table" style="margin-top:15px">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ลำดับ</th>
              <th scope="col">USERNAME</th>
              <th scope="col">ชื่อจริง</th>
              <th scope="col">นามสกุล</th>
              <th scope="col">เพศ</th>
              <th scope="col">เบอร์โทร</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php
                $sql_category = "SELECT * FROM members";
                $result = $conn->query($sql_category); 
                if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <th scope="row"><?php echo $row["member_id"]; ?></th>
              <td><?php echo $row["member_user"]; ?></td>
              <td><?php echo $row["member_name"]; ?></td>
              <td><?php echo $row["member_surname"]; ?></td>
              <td><?php echo $row["member_gender"]; ?></td>
              <td><?php echo $row["member_phone"]; ?></td>
              <td width="20%">
                <div class="btn-group btn-block" role="group" aria-label="Basic example">
                    <a href="manager_customer_edit.php?id=<?php echo $row["member_id"]; ?>" class="btn btn-warning"><i class="fas fa-pen-square"></i> แก้ไข</a>
                    <a href="manager_customer_delete.php?id=<?php echo $row["member_id"]; ?>" class="btn btn-danger"><i class="fas fa-minus-square"></i> ลบ</a>
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
        <h5 class="modal-title" id="">เพิ่มสมาชิก</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post">
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" id="" placeholder="ใส่ยูเซอร์เนม" name="username">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" id="" placeholder="ใส่รหัสผ่าน" name="password">
        </div>
        <div class="form-group">
            <label for="">ชื่อจริง</label>
            <input type="text" class="form-control" id="" placeholder="" name="namea">
        </div>
        <div class="form-group">
            <label for="">นามสกุล</label>
            <input type="text" class="form-control" id="" placeholder="" name="nameb">
        </div>
        <div class="form-group">
            <label for="">สถานะ</label>
            <select class="form-control" id="" name="role">
            <option value="member">ผู้ใช้ระบบ</option>
            <option value="admin">ผู้ดูแลระบบ</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary" name="submit_customer"><i class="fas fa-plus-square"></i> เพิ่มสมาชิก</button>
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

</html>

<?php 
@$strSQL = "SELECT * FROM members WHERE member_id = '".$_SESSION['member_id']."' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

?>
<!-- <nav class="navbar navbar-light bg-light">
    <div class="container">
        <img src="https://shoponline.ondemand.in.th/static/version1554274969/frontend/OnDemand/default/th_TH/images/shared/default/logo.svg" width="200">
        <form class="form-inline">
            <?php if(@$_SESSION['member_role'] == "") { ?>
            <a href="login.php"><h5 style="padding-top: 20px;">เข้าสู่ระบบ / Login</h5></a>
            <?php } else { ?> 
                <h5 style="padding-top: 20px;">
                <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $objResult["member_name"]; ?> <?php echo $objResult["member_surname"]; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="left: 58.8%;top: 70%;">
                    <a class="dropdown-item" href="./admin/manager_course.php">จัดการระบบ</a>
                    <a class="dropdown-item" href="member_order_list.php">การชื้อของฉัน</a>
                    <a class="dropdown-item" href="profile.php">บัญชีของฉัน</a>
                </div> 
                | 
                <a href="logout.php" style="color:#d9272e;">
                    <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                </a>
            </h5>
            
            <?php } ?>
        </form>
    </div>
</nav> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="./">หน้าหลัก</a>
        </li>
        <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          พันธุ์
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="category.php?id=1">พันธุ์ปอมเมอเรเนียน</a>
          <a class="dropdown-item" href="category.php?id=2">พันธุ์ชิวาว่า</a>
          <a class="dropdown-item" href="category.php?id=3">พันธุ์ชิสุ</a>
          <a class="dropdown-item" href="category.php?id=4">พันธุ์ไซบีเรีย</a>
          <a class="dropdown-item" href="category.php?id=5">พันธุ์โกลเดินริทรีฟเวอร์</a>
        </div>
      </li>
        <li class="nav-item active">
            <a class="nav-link" href="member_order_list.php">แจ้งการโอน</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="#">ติดต่อ</a>
        </li>
        </ul>
        <ul class="navbar-nav ">
                <!-- PROFILE DROPDOWN - scrolling off the page to the right -->
                <?php if(@$_SESSION['member_role'] == "") { ?>
                    <a href="login.php" style="color:#FFFFFF">เข้าสู่ระบบ / Login</a>
                <?php } else { ?> 
                    <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navDropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $objResult["member_name"]; ?> <?php echo $objResult["member_surname"]; ?></a>
                    <div class="dropdown-menu" aria-labelledby="navDropDownLink">
                        <a class="dropdown-item" href="./admin/manager_course.php">จัดการระบบ</a>
                        <a class="dropdown-item" href="member_order_list.php">การชื้อของฉัน</a>
                        <a class="dropdown-item" href="profile.php">บัญชีของฉัน</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                    </div>
                </li>
                <?php } ?>
            </ul>
            
    </div>
  </div>
</nav>
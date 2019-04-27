<?php 
    session_start();
    include("includes/connect.php");
        $id = $_SESSION['member_id'];
        $sql = "SELECT * FROM members WHERE member_id = '".$id."'";
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
            <div class="col-4">
            <form method="post" action="profile_save.php" enctype="multipart/form-data">
                <?php if($row["member_img"] == NULL) {?>
                    <img src="avatar/member.png" alt="..." class="img-thumbnail" style="margin-bottom: 10px;">
                <?php } else { ?>
                    <img src="<?php echo $row["member_img"]?>" alt="..." class="img-thumbnail" style="margin-bottom: 10px;">
                <?php } ?>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="filUpload" id="customFile">
                    <label class="custom-file-label"for="customFile">Choose file</label>
                </div>
            </div>
            <div class="col-8">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" value="<?php echo $row["member_user"];?>" disabled>
            </div>
            <div class="form-group">
                <label>อีเมล</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row["member_email"];?>">
            </div>
            <div class="form-group">
                <label>เบอร์โทรศัพท์</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $row["member_phone"];?>">
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อ</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $row["member_name"];?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">นามสกุล</label>
                        <input type="text" class="form-control" name="surname" value="<?php echo $row["member_surname"];?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">ที่อยู่</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3"><?php echo $row["member_address"];?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">เพศ</label>
                <select class="form-control" name="gender">
                <option value="1">ชาย</option>
                <option value="2">หญิง</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">บันทึก</button>
            </form>
            

            </div>
        </div>
    </div>
</div>
</body>
<?php 
  session_start();

  if (isset($_SESSION['username'])) {
  
    include 'app/db.conn.php';
    include 'app/helpers/user.php';
    $user = getUser($_SESSION['username'],$conn);

  	
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>FakeFace</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/Logo.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body class="body">
    <div class="wrapper">
       <div class="re_title">Sửa Thông tin cá nhân</div>
            <div class="main3">
            <form method="POST" action="app/modules/quanliuser/xuly.php?iduser=<?php echo $user['user_id'] ?>" enctype="multipart/form-data">
              <div class="Row_lk">
                <div class="Row_lk-title">Tên Người Dùng</div>
                <input type="text" value="<?php echo $user['name'] ?>" name="username" class="Row_lk-input">
              </div>

              <div class="Row_lk">
                <div class="Row_lk-title">Ảnh đại diện</div>
                <input type="file"  name="avatar" class="Row_lk-input">
                <img src="./uploads/<?php echo $user['p_p'] ?>" alt=""  >
              </div>

              <div class="Row_lk">
                <div class="Row_lk-title">Background</div>
                <input type="file"  name="background" class="Row_lk-input">
                <img src="./upload2/<?php echo $user['backgr'] ?>" alt="" >
              </div>

              <div class="Row_lk">
                <div class="Row_lk-title">Ngày Sinh</div>
                <input type="date" value="<?php echo $user['DOB'] ?>" name="DOB" class="Row_lk-input">
              </div>
               

              <div class="Row_lk">
                <div class="Row_lk-title">Địa chỉ</div>
                <input type="text" value="<?php echo $user['place'] ?>" name="place" class="Row_lk-input"> 
              </div>

              <div class="Row_lk">
                <div class="Row_lk-title">Trường Học</div>
                <input type="text" value="<?php echo $user['school'] ?>" name="school"class="Row_lk-input">
              </div>

              <div class="Row_lk">
                <div class="Row_lk-title">Nơi làm việc hiện tại</div>
                <input type="text" value="<?php echo $user['company'] ?>" name="company"class="Row_lk-input">
              </div>
              <div class="Row_lk_input">
                 <input type="submit" name="suathongtin" value="Sửa Thông Tin">
                 <a href="home.php">Back Home</a>
              </div>
            </form>
            </div>
       
    </div>
</body>
</html>

<?php
  }else{
  	header("Location: index.php");
   	exit;
  }
 ?>
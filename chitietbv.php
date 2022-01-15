<?php 
  session_start();

  if (isset($_SESSION['username'])) {
    include 'app/config.php';
    include 'app/db.conn.php';
    include 'app/helpers/user.php';
    include 'app/helpers/conversations.php';
    include 'app/helpers/timeAgo.php';
    include 'app/helpers/last_chat.php';
    
    include 'app/helpers/opened.php';
    $user = getUser($_SESSION['username'],$conn);
    $conversations = getConversation($user['user_id'],$conn);
  
          

  	
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/js.js"></script>
</head>
<body class="body">
    <div class="wrapper">
       <?php
          include 'pages/header.php';
          include 'bv_chitiet/bv_ct.php';
       ?>
       
    </div>
</body>
</html>

<?php
  }else{
  	header("Location: index.php");
   	exit;
  }
 ?>
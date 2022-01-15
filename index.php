<?php 
  session_start();

  if (!isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>FakeFace - Login </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/Logo.png">
</head>
<body>
    <div class="main1 d-flex justify-content-between align-items-center  vh-100">
    <div class="banner-login d-flex justify-content-between align-items-center vh-100">
        <div class="gr-all ">
        <div class="gr1 d-flex justify-content-center align-items-center ">
            <img src="./img/project2019_token_490px-removebg-preview.png" alt="" class="banner-logo2">
        </div>
     <div class="gr2 d-flex justify-content-between align-items-center ">
        <img src="./img/image_processing20211103-32589-9efjqt.gif" alt="Logo" class="banner-logo">
        <h3 class="name-logo">Fake FaceBook</h3>
    </div></div>
    </div>
    <div class="w-400 p-5 rounded shadow login-form">
    
    <form method="post" 
	 	      action="app/http/auth.php">
	 		<div class="d-flex justify-content-center align-items-center flex-column">

	 		<img src="img/2.png"  class="w-25 img-login rounded-circle logo-sig">
	 		<h3 class="display-4 fs-1  text-center color_white"> LOGIN</h3>   


	 		</div>
	 		<?php if (isset($_GET['error'])) { ?>
	 		<div class="alert alert-warning" role="alert">
			  <?php echo htmlspecialchars($_GET['error']);?>
			</div>
			<?php } ?>
			
	 		<?php if (isset($_GET['success'])) { ?>
	 		<div class="alert alert-success" role="alert">
			  <?php echo htmlspecialchars($_GET['success']);?>
			</div>
			<?php } ?>
		  <div class="mb-3">
		    <label class="form-label color_white" > User name</label>
		    <input type="text" class="form-control" name="username">
		  </div>

		  <div class="mb-3">
		    <label class="form-label color_white">  Password</label>
		    <input type="password"  class="form-control" name="password">
		  </div>
		  
		  <button type="submit"  class="btn btn-primary"> LOGIN</button>
		  <a href="signup.php">Sign Up</a>
		</form>
  
    </div></div>
</body>
</html>
<?php
  }else{
  	header("Location: ./home.php");
   	exit;
  }
 ?>
<?php 

session_start();

include('../config.php');
include('../db.conn.php');
include('../helpers/user.php');

$like_tetx=$_POST['text_L'];
$id_user = $_POST['id_user'];
$id_baiviet = $_POST['id_baiviet'];

if (isset($_SESSION['username'])) {
    $sql2 = "SELECT * FROM conversations_bv
    WHERE (user_1=? AND baiviet=?)
    OR    (baiviet=? AND user_1=?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute([$id_user, $id_baiviet, $id_user, $id_baiviet]);


    define('TIMEZONE', 'Africa/Addis_Ababa');
    date_default_timezone_set(TIMEZONE);

    $time = date("h:i:s a");

    if ($stmt2->rowCount() == 0 ) {
     # insert them into conversations table 
    $sql3 = "INSERT INTO 
          conversations_bv(user_1, baiviet)
          VALUES (?,?)";
 $stmt3 = $conn->prepare($sql3); 
 $stmt3->execute([$id_user, $id_baiviet]);
}
  ?>
  
  <i class="fas fa-heart black-ic"></i>

<?php 

    
  }
else {
	header("Location: ../../index.php");
	exit;
}
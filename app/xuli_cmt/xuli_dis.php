<?php 

session_start();

include('../config.php');
include('../db.conn.php');
include('../helpers/user.php');


$id_user = $_POST['id_user'];
$id_baiviet = $_POST['id_baiviet'];

if (isset($_SESSION['username'])) {
    $sql_delete = "DELETE FROM conversations_bv WHERE conversations_bv.user_1 = '$id_user' AND   conversations_bv.baiviet = '$id_baiviet'  ORDER BY  conversation_id";
    mysqli_query($mysqli,$sql_delete);
    
  ?>
  
  <i class="fas fa-heart "></i>

<?php 

    
  }
else {
	header("Location: ../../index.php");
	exit;
}
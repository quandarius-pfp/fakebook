<?php 

session_start();
include('../app/config.php');
include('../app/db.conn.php');
include('../app/helpers/user.php');

$comment = $_POST['comment'];
$id_user = $_POST['id_user'];
$id_baiviet = $_POST['id_baiviet'];





if (isset($_SESSION['username'])) {
    $user = getUser($_SESSION['username'], $conn);
   
     
     if (isset( $_POST['comment']) && isset($_POST['id_user']) && $comment!='') {
         $sql_in =  "INSERT INTO comment (from_id,to_id,comments) VALUE (?, ?, ?)";
         $stmt = $conn->prepare($sql_in);
         $res  = $stmt->execute([$id_user, $id_baiviet, $comment]);

         if ($res){
             	
      

       define('TIMEZONE', 'Africa/Addis_Ababa');
       date_default_timezone_set(TIMEZONE);

       $time = date("h:i:s a");

     

?>

<div class="another-user-comment user-comment">
							    <div class="box-upnews-user box-upnews-user1">
                                   <a href=""><img src="../uploads/<?= $user['p_p'] ?>" alt="<?= $user['name'] ?>" title="<?= $user['name']?>"></a> 
                                </div>
								<div class="user-comment-inp2">
                                    <div class="user-comment-inp2-text-name"><?=$user['name']?></div>
									<div class="user-comment-inp2-text"><?=$comment ?></div>
								    <div class="user-comment-inp2-time">Vừa Xong</div>
									
							  </div>
							  
							 </div>

<?php 
         }
     }
	
  }else {
	header("Location: ../../index.php");
	exit;
}
 

    






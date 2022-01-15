<?php 

session_start();

# check if the user is logged in
if (isset($_SESSION['username'])) {

	if (isset($_POST['id_2'])) {
	
	# database connection file
	include '../db.conn.php';

	$id_1  = $_SESSION['user_id'];
	$id_2  = $_POST['id_2'];
	$opend = 0;

	$sql = "SELECT * FROM comment
	        WHERE to_id=?
	        AND   from_id= ?
	        ORDER BY chat_id ASC";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id_1, $id_2]);

	if ($stmt->rowCount() > 0) {
	    $cmts = $stmt->fetchAll();

	    # looping through the chats
	    foreach ($cmts as $cmt) {
	    	if ($cmt['opened'] == 0) {
	    		
	    		$opened = 1;
	    		$cmt_id = $cmt['chat_id'];

	    		$sql2 = "UPDATE comment
	    		         SET opened = ?
	    		         WHERE chat_id = ?";
	    		$stmt2 = $conn->prepare($sql2);
	            $stmt2->execute([$opened, $cmt_id]); 

	            ?>
                  
	            <?php
	    	}
	    }
	}

 }

}else {
	header("Location: ../../index.php");
	exit;
}
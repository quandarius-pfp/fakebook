<?php 

function lastChat($id_1, $id_2, $conn){
   
   $sql = "SELECT * FROM chats WHERE (from_id=? AND to_id=?) OR    (to_id=? AND from_id=?) ORDER BY chat_id DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_1, $id_2, $id_1, $id_2]);


    if ($stmt->rowCount() > 0) {
    	$chat = $stmt->fetch();
    	return $chat['message'];
      
    }else {
    	$chat = '';
    	return $chat;
    }

}

function lastChat2($id_1, $id_2, $conn){
   
    $sql2 = "SELECT * FROM chats WHERE (from_id=? AND to_id=?) OR    (to_id=? AND from_id=?) ORDER BY chat_id DESC LIMIT 1";
     $stmt2 = $conn->prepare($sql2);
     $stmt2->execute([$id_1, $id_2, $id_1, $id_2]);
     $stt= 0;
 
     if ($stmt2->rowCount() > 0) {
         
         return $stt+=1;
         
     }else {
         $stt=0;
         return $stt;
     }
 
 }
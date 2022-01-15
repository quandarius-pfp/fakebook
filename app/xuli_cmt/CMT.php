<?php 

function getCmt($id_1, $baiviet, $conn){
   
   $sql = "SELECT * FROM comment
           WHERE (from_id=? AND to_id=?)
           OR    (to_id=? AND from_id=?)
           ORDER BY chat_id ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_1, $baiviet, $id_1, $baiviet]);

    if ($stmt->rowCount() > 0) {
    	$cmts = $stmt->fetchAll();
    	return $cmts;
    }else {
    	$cmts = [];
    	return $cmts;
    }

}
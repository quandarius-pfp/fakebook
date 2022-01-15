<?php
    $id_bv = $_GET['id_bv'];
 
    include './app/xuli_cmt/Timehasre.php';
	$sql_bv = "SELECT * FROM bai,users  WHERE bai.user_id = users.user_id AND bai.id_baiviet = '$id_bv'  ORDER BY bai.id_baiviet DESC";
	$query_bv = mysqli_query($mysqli,$sql_bv);

	$user_id1=$user['user_id'];
?>
				<div class="main_bv">	
					<?php
					while($row_bv = mysqli_fetch_array($query_bv)){ 
						$id_BV=$row_bv['id_baiviet']; 
						
						if($row_bv['id_baiviet']%2==0){
							$tt_like=1;
						}else {
							$tt_like=2;
						}
					?>
			
					<div class="baiviet">
						<div class="baiviet-header">
						    <div class="box-upnews-user">
                              <a href="profile/user_pr.php?user=<?= $row_bv['username'] ?>&iduser=<?= $row_bv['user_id'] ?>"><img src="./uploads/<?= $row_bv['p_p'] ?>" alt="<?= $row_bv['name'] ?>" title="<?= $row_bv['name'] ?>"></a> 
                            </div>
							<div class="box-upnews-text">
								<div class="baiviet-user"><a href="profile/user_pr.php?user=<?= $row_bv['username'] ?>"><?= $row_bv['name'] ?></a> </div>
                                 <div class="baiviet-time"><a href="chitietbv.php?user=<?= $row_bv['user_id'] ?>&id_bv=<?= $row_bv['id_baiviet'] ?>"><?=last_time($row_bv['upseen']) ?></a></div>
								 <div class="baiviet-content1"><?= $row_bv['trangthai'] ?> </div>
								 
                            </div>
						</div>
						<div class="baiviet-content">
							<div class="baiviet-content2">
								<?= $row_bv['noidung'] ?>
							</div>
							<?php if (!empty($row_bv['hinhanh_bv'])) { ?> 
							<div class="baiviet-content_img">
								<img src="app/modules/quanlibaiviet/uploads_bv/<?=$row_bv['hinhanh_bv']?>" alt="" id="myImg2<?=$row_bv['id_baiviet'] ?>">
							</div>
							<?php } ?> 

							<?php if (!empty($row_bv['video_bv'])) { ?> 
							<div class="baiviet-content_video">
								<video controls>
								<source src="app/modules/quanlibaiviet/videos/<?=$row_bv['video_bv']?>" type="video/mp4">
								</video>
							</div>
							<?php } ?> 
						</div>
						<div id="myModal2<?=$row_bv['id_baiviet'] ?>" class="modal2">
                              <span id="close2<?=$row_bv['id_baiviet'] ?> " onclick = 'close()' class="close2">&times;</span>
                                <img class="modal-content2" id="img012<?=$row_bv['id_baiviet'] ?>">
                                 <div id="caption2<?=$row_bv['id_baiviet'] ?>"></div>
                             </div>
							 

                          <div class="baiviet-re">
                               

                               <?php
							    
								$sql_demlike ="SELECT * FROM conversations_bv WHERE    conversations_bv.baiviet = '$id_BV'  ORDER BY  conversation_id ";
								$query_demlike = $mysqli->query($sql_demlike);
								$dem_like=mysqli_num_rows($query_demlike);

							 
							   ?>
						      
                             
							<div class="baiviet-re-like ">
								<p id="baiviet-re-like2<?=$row_bv['id_baiviet'] ?>"><?php echo mysqli_num_rows($query_demlike) ?></p>
							 Like </div>

							<?php 
                             $sql_cmt2 = "SELECT name,id_baiviet,comments,p_p,created_at FROM comment INNER JOIN bai ON comment.to_id = bai.id_baiviet INNER JOIN users ON comment.from_id  =users.user_id  WHERE comment.to_id='$id_BV'  ORDER BY comment.chat_id  DESC ";
                             $query_cmt2 = $mysqli->query($sql_cmt2);
							 $dem_cmt=mysqli_num_rows($query_cmt2);
                            ?>
							<div class="baiviet-re-comment"> <p id="baiviet-re-cmt2<?=$row_bv['id_baiviet'] ?>"><?php echo mysqli_num_rows($query_cmt2) ?></p> Comments</div>
						</div>

                        
						<?php 
						   
						    $sql_like ="SELECT * FROM conversations_bv WHERE conversations_bv.user_1 = '$user_id1' AND   conversations_bv.baiviet = '$id_BV'  ORDER BY  conversation_id ";
							$query_like = $mysqli->query($sql_like);
						?>

                         <?php  
						    
							if(mysqli_num_rows($query_like)==1 ){
								?>
                                    <div class="baiviet-re-ic">
							<div class="ic-like " id="ic-dislike<?=$row_bv['id_baiviet'] ?>" ><i class="fas   fa-heart black-ic"></i></div>
							   <div class="ic-comment"><i class="fas fa-comment-alt"></i></div>
						    </div>
								<?php 
							} else {
                              
								?>
                                       <div class="baiviet-re-ic">
							<div class="ic-like " id="ic-like<?=$row_bv['id_baiviet'] ?>" ><i class="fas   fa-heart"></i></div>
							   <div class="ic-comment"><i class="fas fa-comment-alt"></i></div>
						    </div>
								<?php 
							}
							 
						?>

						<div class="baiviet-comment" id="baivietcmt">
						     <div class="user-comment">
							   <div class="box-upnews-user box-upnews-user1">
                                 <a href="profile/user_pr.php?user=<?= $user['username'] ?>"><img src="./uploads/<?= $user['p_p'] ?>" alt="<?= $row_bv['name'] ?>" title="<?= $row_bv['name'] ?>"></a> 
                                </div>
							  <div class="user-comment-inp">
								<textarea type="text"  placeholder="Hãy Viết gì đó ...."   id="comment<?=$row_bv['id_baiviet'] ?>" ></textarea>
							  </div>
							<div class="user-comment-send ">
							     <i class="fas fa-paper-plane " id="sendCmt<?=$row_bv['id_baiviet'] ?>" ></i>
							</div>
							 </div>


							 <div id="result<?=$row_bv['id_baiviet'] ?>">
                                   
                        

                           
                             </div>

							 <?php 
                             $sql_cmt = "SELECT * FROM comment INNER JOIN bai ON comment.to_id = bai.id_baiviet INNER JOIN users ON comment.from_id  =users.user_id    ORDER BY comment.chat_id  DESC ";
                             $query_cmt = $mysqli->query($sql_cmt);
                              ?>

                             <?php
					if ($query_cmt->num_rows > 0) {
                         
                        while($row_cmt = $query_cmt->fetch_assoc()) { 
                             if($row_cmt['id_baiviet'] == $row_bv['id_baiviet'] ){

					?>  

						<div class="another-user-comment user-comment">
							    <div class="box-upnews-user box-upnews-user1">
                                   <a href="profile/user_pr.php?user=<?= $row_cmt['username'] ?>&iduser=<?= $row_cmt['user_id'] ?>"><img src="./uploads/<?= $row_cmt['p_p'] ?>" alt="<?= $row_cmt['name'] ?>" title="<?= $row_cmt['name'] ?>"></a> 
                                </div>
								<div class="user-comment-inp2">
									<div class="user-comment-inp2-text-name"><a href="profile/user_pr.php?user=<?= $row_cmt['username'] ?>"><?php echo $row_cmt['name'] ?></a> </div>
									<div class="user-comment-inp2-text"><?php echo $row_cmt['comments'] ?></div>
								    <div class="user-comment-inp2-time"><?=last_time($row_cmt['created_at']) ?></div>
									
							  </div>
							  
							 </div>


                    <?php }} }?>

							 
							
							
							
							 
						</div>
					</div>
					  
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
					<script>



$(document).ready(function(){
     
	 
	$("#sendCmt<?=$row_bv['id_baiviet'] ?>").on('click', function()
            { 
                $.ajax({
                    url : "app/xuli_cmt/insert_cmt.php", 
                    type : "POST", 
                    dateType:"text", 
                    data : { 
                         comment : $('#comment<?=$row_bv['id_baiviet'] ?>').val(),
						 id_user : <?=$user['user_id']?>,
						 id_baiviet: <?=$row_bv['id_baiviet'] ?>,
						
						
						 
						 
                    },
                    success : function (result){
                        
                        $('#result<?=$row_bv['id_baiviet'] ?>').html(result);
						if( $('#comment<?=$row_bv['id_baiviet'] ?>').val()!=''){
							$('#baiviet-re-cmt2<?=$row_bv['id_baiviet'] ?>').html(<?php echo  $dem_cmt+1 ?>)
						}
						$('#comment<?=$row_bv['id_baiviet'] ?>').val()="";
						
                    }
                });
            } );



			$("#ic-like<?=$row_bv['id_baiviet'] ?>").on('click', function()
            { 
                $.ajax({
                    url : "app/xuli_cmt/xuli_like.php", 
                    type : "POST", 
                    dateType:"text", 
                    data : { 
						 text_L : <?=$tt_like ?>,
						 id_user : <?=$user['user_id']?>,
						 id_baiviet: <?=$row_bv['id_baiviet'] ?>,
						
						
						 
						 
                    },
                    success : function (result){
                        
                        $('#ic-like<?=$row_bv['id_baiviet'] ?>').html(result);
						$('#baiviet-re-like2<?=$row_bv['id_baiviet'] ?>').html(<?php echo ($dem_like+1) ?> );
                    }
                });
            } );

			$("#ic-dislike<?=$row_bv['id_baiviet'] ?>").on('click', function()
            { 
                $.ajax({
                    url : "app/xuli_cmt/xuli_dis.php", 
                    type : "POST", 
                    dateType:"text", 
                    data : { 
						 
						 id_user : <?=$user['user_id']?>,
						 id_baiviet: <?=$row_bv['id_baiviet'] ?>,
						
						
						 
						 
                    },
                    success : function (result){
                        
                        $('#ic-dislike<?=$row_bv['id_baiviet'] ?>').html(result);
						$('#baiviet-re-like2<?=$row_bv['id_baiviet'] ?>').html(<?php echo ($dem_like-1) ?> );
                    }
                });
            } );


			

			// auto refresh / reload
			
      /** 
      auto update last seen 
      every 0.5 sec
      **/
    
     




});
	                           
	
                    </script>



					<?php
					} 
					?>
					
				</ul>

				<script src="../js/js.js"></script>
            </div>	

 
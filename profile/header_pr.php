<div class="header d-flex justify-content-between">
        <div class="header-left d-flex justify-content-between">
          <a href="../home.php" class="logo-header">
            <img src="../img/Logo.png" alt="">
            
          </a>
          <div class="header-search">
            <input type="text" placeholder="Tìm kiếm trên FakeBook" class="search-inp" id="searchText" autocomplete="off" aria-autocomplete="list"> 
            <div class="search-out">
            <ul class="list-group  " id="chatList">
                         <?php
                            
                            if( !empty( $conversations)){ ?>

                           <?php foreach($conversations as $conversation){ ?>
                  
                        <a href="chat.php?user=<?=$conversation['username'] ?>" class="">
                             <div class="chat-user">
                                <div class="user-chat-img">
                                  <img  src="../uploads/<?=$conversation['p_p'] ?>" alt="" >
                                </div>


                              <div class="user-chat-content">
                                
                                   <div class="user-chat-name"><?=$conversation['name'] ?></div>
                                  
                              </div>
                                  
                             </div>

                             <?php if (last_seen($conversation['last_seen'] )== "Active"){ ?>

                            
                             <div title="online">
                                  <div class="online"></div>
                             </div>
                             
                              <?php } ?>
                        </a>
                 
                   <?php  } ?>
                  <?php  } else { ?>
                    <div class="alert alert-info text-center" role="alert">
                      <i class="fa fa-comments d-block fs-big"></i>
                      No messages yet . Start the Conversations
                    </div>
                  <?php  } ?>
              </ul>
            </div>
          </div>
        </div><div class="header-center ">
            <ul class="d-flex justify-content-center">
              <li><a href="../home.php"><i class="fas fa-home "></i></a></li>
              <li><a href="../video.php"><i class="fas fa-video"></i></a></li>
             
            </ul>
          </div>
        <div class="header-right d-flex justify-content-between">
          <div class="user-img">
           <a href="user_pr.php?user=<?= $user['username'] ?>&id_user=<?= $user['user_id'] ?>"><img src="../uploads/<?= $user['p_p'] ?>" alt=""></a> 
          </div>
          <div class="chat-icon">
          <i class="fab fa-facebook-messenger"></i>
          <div class="messenger-tb">
            <div class="messenger_ti">
              Message 
            </div>
            <div class="messenger_content">
            <ul class="list-group  " id="chatList">
                         <?php
                            
                            if( !empty( $conversations)){ ?>

                           <?php foreach($conversations as $conversation){ ?>
                  
                        <a href="../chat.php?user=<?=$conversation['username'] ?>" class="">
                             <div class="chat-user">
                                <div class="user-chat-img">
                                  <img  src="../uploads/<?=$conversation['p_p'] ?>" alt="" >
                                </div>


                              <div class="user-chat-content">
                                   <div class="user-chat-name"><?=$conversation['name'] ?></div>
                                  <small>
                                  <div class="user-chat-text">
                        <?php 
                          echo "<div class='open-top'></div>";
                          echo   lastChat($_SESSION['user_id'], $conversation['user_id'], $conn);
                        ?>
                                  </div>
                      </small>
                              </div>
                                  
                             </div>

                             <?php if (last_seen($conversation['last_seen'] )== "Active"){ ?>

                            
                             <div title="online">
                                  <div class="online"></div>
                             </div>
                             
                              <?php } ?>
                        </a>
                 
                   <?php  } ?>
                  <?php  } else { ?>
                    <div class="alert alert-info text-center" role="alert">
                      <i class="fa fa-comments d-block fs-big"></i>
                      No messages yet . Start the Conversations
                    </div>
                  <?php  } ?>
              </ul>
            </div>
          </div>
          </div>
          <div class="Notify">
          <i class="fas fa-bell"></i>
          <div class="Notify-tb">
          <div class="messenger_ti">
              Thông Báo
            </div>
            <div class="messenger_content messenger_content2">
                <?php 
                  $sql_bv = "SELECT * FROM bai,users  WHERE bai.user_id = users.user_id   ORDER BY bai.id_baiviet DESC";
                  $query_bv = mysqli_query($mysqli,$sql_bv);
                  
                  while($row_bv = mysqli_fetch_array($query_bv)){ 
                    if($row_bv['user_id']!=$user['user_id']){
                ?> 
                     <a href="../chitietbv.php?user=<?= $row_bv['user_id'] ?>&id_bv=<?= $row_bv['id_baiviet'] ?>" class="chat-user">
                                <div class="user-chat-img">
                                  <img  src="../uploads/<?=$row_bv['p_p'] ?>" alt="" >
                                </div>


                              <div class="user-chat-content">
                                   <div class="user-chat-name"><?=$row_bv['name'] ?></div>
                               <?php 
                                if(!empty($row_bv['hinhanh_bv'])){ ?> 
                                    <div class="info-content">
                                       Đã Thêm 1 hình ảnh mới
                                    </div>
                                    <?=last_seen($row_bv['upseen']) ?>
                               <?php } 

                               
                               elseif(!empty($row_bv['video_bv'])){ ?> 
                                    <div class="info-content">
                                       Đã Thêm 1 video mới
                                    </div>
                                    <?=last_seen($row_bv['upseen']) ?>
                               <?php }  
                               else  if(!empty($row_bv['hinhanh_bv'])){ ?> 
                                    <div class="info-content">
                                       Đã Thêm 1 hình ảnh mới
                                    </div>
                                    <?=last_seen($row_bv['upseen']) ?>
                               <?php }  
                                  else {?> 
                                    <div class="info-content">
                                       Đã Thêm 1 bài viết mới
                                    </div>
                                    <?=last_seen($row_bv['upseen']) ?>
                               <?php } ?>
                               

                                
                      
                              </div>
                                  
                             </a>
                  
                 <?php } }?>
          </div> </div>
          </div>
          <div class="setting">
          <i class="fas fa-cog"></i>
            <div class="setting_tb"> 
              <a href="../logout.php" class="setting_tb-a"> 
                <div class="icon-link"><i class="fas fa-sign-out-alt"></i></div>
                <div class="link-text">Logout</div>
              </a>
            </div>
          </div>
        </div>
          </div>


          <script>
	$(document).ready(function(){
      
      // Search
       $("#searchText").on("input", function(){
       	 var searchText = $(this).val();
         if(searchText == "") return;
         $.post('search_pr.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });

       // Search using the button
       $("#serachBtn").on("click", function(){
       	 var searchText = $("#searchText").val();
         if(searchText == "") return;
         $.post('search_pr.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });


      /** 
      auto update last seen 
      for logged in user
      **/
      
    });
</script>
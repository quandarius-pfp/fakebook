<?php 



    include 'app/config.php';
   
          

  	
?>




<div class="main">
    <div class="main-left1">
        
    </div>
    <div class="main-left">
        <div class="background-img"> <img src="./upload2/<?= $user['backgr'] ?>" alt=""> </div>
        <div class="user-img-main"> <img src="./uploads/<?= $user['p_p'] ?>" alt=""> </div>


        <div class="user-name-main"> <?= $user['name'] ?> </div>

        <div class="user-content-main">
        <div class="user-age-main">
            <div class="user-age-main-i"><i class="fas fa-calendar-alt"></i></div>
            <div class="user-age-main-text"><?= $user['DOB'] ?></div>
        </div>

        <div class="user-age-main">
            <div class="user-age-main-i"><i class="fas fa-map-marker-alt"></i></div>
            <div class="user-age-main-text"><?= $user['place'] ?></div>
        </div>

        <div class="user-age-main">
            <div class="user-age-main-i"><i class="fas fa-graduation-cap"></i></div>
            <div class="user-age-main-text"><?= $user['school'] ?></div>
        </div>

        <div class="user-age-main">
            <div class="user-age-main-i"><i class="fas fa-briefcase"></i></div>
            <div class="user-age-main-text"><?= $user['company'] ?></div>
        </div>
        <div class="re-info"><a href="addINF.php?iduser=<?php echo $user['user_id'] ?>"><i class="fas fa-edit"></i> Sửa Thông tin cá nhân</a></div>
        
    </div></div>
    <div class="main-center">
       
       <?php
     
            include './pages_video/news_vd.php';
       ?>
      
    </div>

    
    <div class="main-right">
        <?php $id_user_chat = $user['user_id']; ?>
        <div class="main-right-title"> Message connection </div>
        <div class="main-right-list">
            
                    
            <?php 
               
               $sql_user_li = "SELECT * FROM users WHERE user_id != '$id_user_chat' ORDER BY  user_id";
               $query_user_li = mysqli_query($mysqli,$sql_user_li);
               

               while ($row_user_li = mysqli_fetch_array($query_user_li)){


              
            ?>
                   
                <div  class="a-user-list">
                <a href="chat.php?user=<?=$row_user_li['username'] ?>">
                    <img src="./uploads/<?=$row_user_li['p_p'] ?>" alt="<?=$row_user_li['name'] ?>" title="<?=$row_user_li['name'] ?>">
                    <div class="a-user-list_name"><?=$row_user_li['name'] ?></div>
                </a></div>

                <?php  } ?>
                


                


            
        </div>
    </div>
    <div class="main-right1"></div>
</div>
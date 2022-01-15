<?php 
  
  include '../../db.conn.php';
   $username = $_POST['username'];


   //xuli hinh anh avatar
   
   $avatar = $_FILES['avatar']['name'];
   $avatar_tmp = $_FILES['avatar']['tmp_name'];
   $avatar = time().'_'.$avatar;

   //xuli hinh anh background

   $background = $_FILES['background']['name'];
   $background_tmp= $_FILES['background']['tmp_name'];
   $background = time().'_'.$background;

   $DOB = $_POST['DOB'];
   $place = $_POST['place'];
   $school = $_POST['school'];
   $company = $_POST['company'];

   if(isset($_POST['suathongtin'])){





       
    $conn = new mysqli("localhost", "root", "", "fake_fb");
    
    if(!empty($_FILES['avatar']['name']) ){
      $img_ex = pathinfo($avatar, PATHINFO_EXTENSION);

              
      $img_ex_lc = strtolower($img_ex);

      
      $allowed_exs = array("jpg", "jpeg", "png");

      
      if (in_array($img_ex_lc, $allowed_exs)) {
        
        

    
        $img_upload_path = '../../../uploads/'.$avatar;

                  unlink( $img_upload_path);
                  move_uploaded_file($avatar_tmp, $img_upload_path);
      }else {
          
      } 
      $sql_update = "UPDATE users SET name='".$username."',p_p='".$avatar."',DOB='".$DOB."',place='".$place."',school='".$school."',company='".$company."' WHERE user_id='$_GET[iduser]'";
      
      
          
    }else if(!empty($_FILES['background']['name']) ){
               
      $img_ex2 = pathinfo($background, PATHINFO_EXTENSION);

              
      $img_ex_lc2 = strtolower($img_ex2);

      
      $allowed_exs2 = array("jpg", "jpeg", "png");

      
      if (in_array($img_ex_lc2, $allowed_exs2)) {
        
      

    
        $img_upload_path2 = '../../../upload2/'.$background;

                  unlink( $img_upload_path2);
                  move_uploaded_file($background_tmp, $img_upload_path2);
      }else {
          
      } 
      $sql_update = "UPDATE users SET name='".$username."',backgr='".$background."',DOB='".$DOB."',place='".$place."',school='".$school."',company='".$company."' WHERE user_id='$_GET[iduser]'";
      
    } 
      
      else {
        
        $sql_update = "UPDATE users SET name='".$username."',DOB='".$DOB."',place='".$place."',school='".$school."',company='".$company."' WHERE user_id='$_GET[iduser]'";
      }
    
      if ($conn->query($sql_update) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
     
    $conn->close();
      
    header('Location:../../../home.php');

   }
   
    

 
?>
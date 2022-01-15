<?php 

include "../app/config.php";

$noidung = $_POST['noidung'];
$user_id = $_GET['user_id'];
$trangthai1=$_POST['trangthai'];
$username=$_GET['user'];


if($trangthai1==1){
	$trangthai='Vui vẻ';
}else if($trangthai1==2){
	$trangthai='Buồn bã';
}else if($trangthai1==3){
	$trangthai='Tức Giận';
} else if($trangthai1==4){
	$trangthai='Thất Vọng';
}


$hinhanh_bv = $_FILES['hinhanh_bv']['name'];
$hinhanh_bv_tmp = $_FILES['hinhanh_bv']['tmp_name'];
$hinhanh_bv = time().'_'.$hinhanh_bv;


$maxsize = 52428800; 
$extensions_arr = array("mp4","avi","3gp","mov","mpeg");

$video_bv = $_FILES['video_bv']['name'];
$video_bv_tmp = $_FILES['video_bv']['tmp_name'];
$video_bv = time().'_'.$video_bv;




$videoFileType = strtolower(pathinfo("../app/modules/quanlibaiviet/videos/".$_FILES['video_bv']['name'],PATHINFO_EXTENSION));

if(isset($_POST['thembaiviet'])){
    if(!empty($_FILES['hinhanh_bv']['name'])) {
	$sql_them = "INSERT INTO bai(noidung,hinhanh_bv,user_id,trangthai) VALUE('".$noidung."','".$hinhanh_bv."','".$user_id."','".$trangthai."')";
		mysqli_query($mysqli,$sql_them);
		move_uploaded_file($hinhanh_bv_tmp,'../app/modules/quanlibaiviet/uploads_bv/'.$hinhanh_bv);
        header("Location:user_pr.php?user=$username&iduser=$user_id");
	
	}elseif(!empty($_FILES['video_bv']['name'])){
		if(in_array($videoFileType,$extensions_arr)){
			$sql_them = "INSERT INTO bai(noidung,video_bv,user_id,trangthai) VALUE('".$noidung."','".$video_bv."','".$user_id."','".$trangthai."')";   
			mysqli_query($mysqli,$sql_them);
			move_uploaded_file($video_bv_tmp,'../app/modules/quanlibaiviet/videos/'.$video_bv);
			header("Location:user_pr.php?user=$username&iduser=$user_id");
		}
		
	}
	
	
	else  {
		$sql_them = "INSERT INTO bai(noidung,user_id,trangthai) VALUE('".$noidung."','".$user_id."','".$trangthai."')";
		mysqli_query($mysqli,$sql_them);
		header("Location:user_pr.php?user=$username&iduser=$user_id");
	}
}
?>
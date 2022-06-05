<?php
require_once ("../../include/initialize.php");
	  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;
}
   
	function doInsert(){
		if(isset($_POST['save'])){
			if ($_POST['U_NAME'] == "" OR $_POST['U_USERNAME'] == "" OR $_POST['U_PASS'] == "") {
				$messageStats = false;
				message("Tất cả các trường là bắt buộc!","error");
				redirect('index.php?view=add');
		}else{	
			$user = New User();
			$user->USERID = $_POST['user_id'];
			$user->FULLNAME = $_POST['U_NAME'];
			$user->USERNAME	= $_POST['U_USERNAME'];
			$user->PASS	=sha1($_POST['U_PASS']);
			$user->ROLE	=  $_POST['U_ROLE'];
			$user->create();
			$autonum = New Autonumber(); 
			$autonum->auto_update('userid');
			message("Tài khoản [". $_POST['U_NAME'] ."] đã tạo thành công!", "success");
			redirect("index.php");
			}
		}
	}

	function doEdit(){
	if(isset($_POST['save'])){
			$user = New User(); 
			$user->FULLNAME = $_POST['U_NAME'];
			$user->USERNAME	= $_POST['U_USERNAME'];
			$user->PASS	=sha1($_POST['U_PASS']);
			$user->ROLE	= $_POST['U_ROLE'];
			$user->update($_POST['USERID']);

			if (isset($_GET['view'])) {
				  message("Hồ sơ đã được cập nhật!", "success");
				redirect("index.php?view=view");
			}else{ 
				message("[". $_POST['U_NAME'] ."] đã được cập nhật!", "success");
				redirect("index.php");
			}
		}
	}

	function doDelete(){
			$id = $_GET['id'];
			$user = New User();
	 		$user->delete($id);
			message("Người dùng đã bị xóa!","information");
			redirect('index.php');
		}

	function doupdateimage(){
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="photos/".$myfile;

		if ( $errofile > 0) {
				message("Không có hình ảnh nào được chọn!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Tệp tải lên không phải là hình ảnh!", "errol");
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"photos/" . $myfile);
					$user = New User();
					$user->PICLOCATION 	= $location;
					$user->update($_SESSION['ADMIN_USERID']);
					redirect("index.php?view=view");		
				}
			}	 
		}
?>

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

 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){

		if ( $_POST['COMPANYNAME'] == "" || $_POST['COMPANYADDRESS'] == "" || $_POST['COMPANYCONTACTNO'] == "" ) {
			$messageStats = false;
			message("Tất cả các lĩnh vực là bắt buộc!","error");
			redirect('index.php?view=add');
		}else{	
			$company = New Company();
			$company->COMPANYNAME		= $_POST['COMPANYNAME'];
			$company->COMPANYADDRESS	= $_POST['COMPANYADDRESS'];
			$company->COMPANYCONTACTNO	= $_POST['COMPANYCONTACTNO'];
			$company->create();
			message("Công ty mới đã được tạo thành công!", "success");
			redirect("index.php");
			
			}
		}
	}

	function doEdit(){
		if(isset($_POST['save'])){
			$company = New Company();
			$company->COMPANYNAME		= $_POST['COMPANYNAME'];
			$company->COMPANYADDRESS	= $_POST['COMPANYADDRESS'];
			$company->COMPANYCONTACTNO	= $_POST['COMPANYCONTACTNO'];
			$company->update($_POST['COMPANYID']);
			message("Công ty đã được cập nhật!", "success");
			redirect("index.php");
		}

	}

	function doDelete(){
		$id = $_GET['id'];
		$company = New Company();
		$company->delete($id);
		message("Công ty đã bị xóa!","info");
		redirect('index.php');	
	}
?>
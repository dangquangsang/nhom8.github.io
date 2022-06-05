<?php
require_once ("../../include/initialize.php");
 if(!isset($_SESSION['ADMIN_USERID'])){
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

	case 'approve' :
	doApproved();
	break;

	case 'checkid' :
	Check_StudentID();
	break;
	
	}
	/* function doDelete(){
		$id = $_GET['id'];
		$company = New Company();
		$company->delete($id);
		message("Công ty đã bị xóa!","info");
		redirect('index.php');	
	} */

	function doDelete(){
		$id = $_GET['id'];
		$emp = New Employee();
	 	$emp->delete($id);
		message("Ứng viên tuyển dụng đã được xóa!","success");
		redirect('index.php');
	}

	function doApproved(){
		global $mydb;
		if (isset($_POST['submit'])) {
		$id = $_POST['JOBREGID'];
		$applicantid = $_POST['APPLICANTID'];
		$remarks = $_POST['REMARKS'];
		$sql="UPDATE `tbljobregistration` SET `REMARKS`='{$remarks}',PENDINGAPPLICATION=0,HVIEW=0,DATETIMEAPPROVED=NOW() WHERE `REGISTRATIONID`='{$id}'";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();

		if ($cur) {
			$sql = "SELECT * FROM `tblfeedback` WHERE `REGISTRATIONID`='{$id}'";
			$mydb->setQuery($sql);
			$res = $mydb->loadSingleResult();
			if (isset($res)) {
				$sql="UPDATE `tblfeedback` SET `FEEDBACK`='{$remarks}' WHERE `REGISTRATIONID`='{$id}'";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
			}else{
				$sql="INSERT INTO `tblfeedback` (`APPLICANTID`, `REGISTRATIONID`,`FEEDBACK`) VALUES ('{$applicantid}','{$id}','{$remarks}')";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery(); 

			}
				message("Ứng viên đang nhận thông báo.", "success");
				redirect("index.php?view=view&id=".$id); 
		   } else  {
				message("Không thể được.", "error");
				redirect("index.php?view=view&id=".$id); 
		   }
		}
	}
?>
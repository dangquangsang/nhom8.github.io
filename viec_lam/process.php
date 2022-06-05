<?php  
require_once ("include/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
	case 'submitapplication' :
	doSubmitApplication();
	break;
  
	case 'register' :
	doRegister();
	break;  

	case 'login' :
	doLogin();
	break; 
	}

function doSubmitApplication() { 
	global $mydb;   
		$jobid  = $_GET['JOBID'];
		$autonum = New Autonumber();
		$applicantid = $autonum->set_autonumber('APPLICANT');
		$autonum = New Autonumber();
		$fileid = $autonum->set_autonumber('FILEID');
		@$picture = UploadImage();
		@$location = "photos/". $picture ;

		if ($picture=="") {
			redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
		}else{ 
			
			if (isset($_SESSION['APPLICANTID'])) {

				$sql = "INSERT INTO `tblattachmentfile` (FILEID,`USERATTACHMENTID`, `FILE_NAME`, `FILE_LOCATION`, `JOBID`) 
				VALUES ('". date('Y').$fileid->AUTO."','{$_SESSION['APPLICANTID']}','Resume','{$location}','{$jobid}')";
				$mydb->setQuery($sql); 
				$res = $mydb->executeQuery(); 
				doUpdate($jobid,$fileid->AUTO);
				
			}else{
				 
				$sql = "INSERT INTO `tblattachmentfile` (FILEID,`USERATTACHMENTID`, `FILE_NAME`, `FILE_LOCATION`, `JOBID`) 
				VALUES ('". date('Y').$fileid->AUTO."','". date('Y').$applicantid->AUTO."','Resume','{$location}','{$jobid}')";
				// echo $sql;exit;
				$mydb->setQuery($sql); 
				$res = $mydb->executeQuery(); 
				doInsert($jobid,$fileid->AUTO); 
				$autonum = New Autonumber();
				$autonum->auto_update('APPLICANT');
			}
		}

		$autonum = New Autonumber();
	    $autonum->auto_update('FILEID'); 
	}

function doInsert($jobid=0,$fileid=0) {
	if (isset($_POST['submit'])) {  
	global $mydb; 
			$birthdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
			$age = date_diff(date_create($birthdate),date_create('today'))->y;

			if ($age < 20){
				message("Tuổi không hợp lệ. 20 tuổi trở lên được phép.", "error");
				redirect("index.php?q=apply&view=personalinfo&job=".$jobid);
			} 
			else {
				$autonum = New Autonumber();
				$auto = $autonum->set_autonumber('APPLICANT');			
				$applicant =New Applicants();
				$applicant->APPLICANTID = date('Y').$auto->AUTO;
				$applicant->FNAME = $_POST['FNAME'];
				$applicant->LNAME = $_POST['LNAME'];
				$applicant->MNAME = $_POST['MNAME'];
				$applicant->ADDRESS = $_POST['ADDRESS'];
				$applicant->SEX = $_POST['optionsRadios'];
				$applicant->CIVILSTATUS = $_POST['CIVILSTATUS'];
				$applicant->BIRTHDATE = $birthdate;
				$applicant->BIRTHPLACE = $_POST['BIRTHPLACE'];
				$applicant->AGE = $age;
				$applicant->USERNAME = $_POST['USERNAME'];
				$applicant->PASS = sha1($_POST['PASS']);
				$applicant->EMAILADDRESS = $_POST['EMAILADDRESS'];
				$applicant->CONTACTNO = $_POST['TELNO'];
				$applicant->DEGREE = $_POST['DEGREE'];
				$applicant->create();
				$sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID` AND JOBID = '{$jobid}'" ;
				$mydb->setQuery($sql);
				$result = $mydb->loadSingleResult();
				$jobreg = New JobRegistration(); 
				$jobreg->COMPANYID = $result->COMPANYID;
				$jobreg->JOBID     = $result->JOBID;
				$jobreg->APPLICANTID = date('Y').$auto->AUTO;
				$jobreg->APPLICANT   = $_POST['FNAME'] . ' ' . $_POST['LNAME'];
				$jobreg->REGISTRATIONDATE = date('Y-m-d');
				$jobreg->FILEID = date('Y').$fileid;
				$jobreg->REMARKS = 'Pending';
				$jobreg->DATETIMEAPPROVED = date('Y-m-d H:i');
				$jobreg->create();
				message("CV của bạn đã được gửi. Vui lòng chờ xác nhận của công ty nếu bạn đủ điều kiện để làm công việc này.","success");
				redirect("index.php?q=success&job=".$result->JOBID);		
	 		}
		}
	}
function doUpdate($jobid=0,$fileid=0) {
	if (isset($_POST['submit'])) {
		global $mydb;   
			$applicant =New Applicants();
			$appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);
			$sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID` AND JOBID = '{$jobid}'" ;
			$mydb->setQuery($sql);
			$result = $mydb->loadSingleResult();
			$jobreg = New JobRegistration(); 
			$jobreg->COMPANYID = $result->COMPANYID;
			$jobreg->JOBID     = $result->JOBID;
			$jobreg->APPLICANTID = $appl->APPLICANTID;
			$jobreg->APPLICANT   = $appl->FNAME . ' ' . $appl->LNAME;
			$jobreg->REGISTRATIONDATE = date('Y-m-d');
			$jobreg->FILEID = date('Y').$fileid;
			$jobreg->REMARKS = 'Pending';
			$jobreg->DATETIMEAPPROVED = date('Y-m-d H:i');
			$jobreg->create();
			message("CV của bạn đã được gửi. Vui lòng chờ xác nhận của công ty nếu bạn đủ điều kiện để làm công việc này.","success");
			redirect("index.php?q=success&job=".$result->JOBID);
 		}
	}
function doRegister(){
	global $mydb;
	if (isset($_POST['btnRegister'])) { 
		$birthdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
		$age = date_diff(date_create($birthdate),date_create('today'))->y;
		if ($age < 20){
			message("Tuổi không hợp lệ. 20 tuổi trở lên được phép.", "error");
			redirect("index.php?q=register");
			}else{
			$autonum = New Autonumber();
			$auto = $autonum->set_autonumber('APPLICANT');			 
			$applicant =New Applicants();
			$applicant->APPLICANTID = date('Y').$auto->AUTO;
			$applicant->FNAME = $_POST['FNAME'];
			$applicant->LNAME = $_POST['LNAME'];
			$applicant->MNAME = $_POST['MNAME'];
			$applicant->ADDRESS = $_POST['ADDRESS'];
			$applicant->SEX = $_POST['optionsRadios'];
			$applicant->CIVILSTATUS = $_POST['CIVILSTATUS'];
			$applicant->BIRTHDATE = $birthdate;
			$applicant->BIRTHPLACE = $_POST['BIRTHPLACE'];
			$applicant->AGE = $age;
			$applicant->USERNAME = $_POST['USERNAME'];
			$applicant->PASS = sha1($_POST['PASS']);
			$applicant->EMAILADDRESS = $_POST['EMAILADDRESS'];
			$applicant->CONTACTNO = $_POST['TELNO'];
			$applicant->DEGREE = $_POST['DEGREE'];
			$applicant->create();
			$autonum = New Autonumber();
			$autonum->auto_update('APPLICANT');
			message("Bạn đã đăng ký thành công trang này. Bạn có thể đăng nhập ngay bây giờ!","success");
			redirect("index.php?q=success");			
	 	}
	}
}

function doLogin(){	
	$email = trim($_POST['USERNAME']);
	$upass  = trim($_POST['PASS']);
	$h_upass = sha1($upass);
  	//tạo ra một đối tượng mới của thành viên
    $applicant = new Applicants();
    //sử dụng hàm tĩnh để chuyển đến các tham số
    $res = $applicant->applicantAuthentication($email, $h_upass);
    if ($res==true) { 
       	message("Bây giờ bạn đã đăng nhập thành công!","success");
        redirect(web_root."applicant/");
    }else{
    	echo "Tài khoản không tồn tại! Vui lòng liên hệ với Quản trị viên."; 
    } 
}
 
function UploadImage($jobid=0){
	$target_dir = "applicant/photos/";
	$target_file = $target_dir . date("dmYhis") . basename($_FILES["picture"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);	
	if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"|| $imageFileType != "gif" ) {
		 if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
			return  date("dmYhis") . basename($_FILES["picture"]["name"]);
		}else{
			message("Lỗi khi tải lên tệp","error");
		}
	}else{
		message("Tệp không được hỗ trợ","error");
	}
} 
?>
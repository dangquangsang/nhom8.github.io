<?php 
require_once("include/initialize.php"); 
$content='home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
	case 'apply' :
        $title="Gửi đơn đăng ký";	
		$content='applicationform.php';		
		break;
	case 'login' : 
        $title="Đăng nhập";	
		$content='login.php';		
		break;
	case 'company' :
        $title="Danh sách các công ty";	
		$content='company.php';		
		break;
	case 'hiring' :
		$title = isset($_GET['search']) ? 'Các công việc ở CTY '.$_GET['search'] :"Ứng tuyển ngay"; 
		$content='hirring.php';		
		break;		
	case 'category' :
        $title='Việc làm cho ' . $_GET['search'];	
		$content='category.php';		
		break;
	case 'viewjob' :
        $title="Chi tiết công việc";	
		$content='viewjob.php';		
		break;
	case 'success' :
        $title="Thành công";	
		$content='success.php';		
		break;
	case 'register' :
        $title="Đăng ký thành viên mới";	
		$content='register.php';		
		break;
	case 'Contact' :
        $title='Liên hệ với chúng tôi';	
		$content='Contact.php';		
		break;	
	case 'About' :
        $title='Về chúng tôi';	
		$content='About.php';		
		break;	
	case 'advancesearch' :
        $title='Tìm kiếm tất cả';	
		$content='advancesearch.php';		
		break;	
	case 'result' :
        $title='Kết quả tìm kiếm';	
		$content='advancesearchresult.php';		
		break;
	case 'search-company' :
        $title='Tìm kiếm theo Công ty';	
		$content='searchbycompany.php';		
		break;	
	case 'search-function' :
        $title='Tìm kiếm theo công việc';	
		$content='searchbyfunction.php';		
		break;							
	default :
	    $active_home='active';
	    $title="Trang chủ";	
		$content ='home.php';		
}
require_once("theme/templates.php");
?>
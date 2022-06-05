<?php 
global $mydb;
	$red_id = isset($_GET['id']) ? $_GET['id'] : '';

	$jobregistration = New JobRegistration();
	$jobreg = $jobregistration->single_jobregistration($red_id);
	 // `COMPANYID`, `JOBID`, `APPLICANTID`, `APPLICANT`, `REGISTRATIONDATE`, `REMARKS`, `FILEID`, `PENDINGAPPLICATION`


	$applicant = new Applicants();
	$appl = $applicant->single_applicant($jobreg->APPLICANTID);
 // `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `SEX`, `CIVILSTATUS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `USERNAME`, `PASS`, `EMAILADDRESS`,CONTACTNO

	$jobvacancy = New Jobs();
	$job = $jobvacancy->single_job($jobreg->JOBID);
 // `COMPANYID`, `CATEGORY`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`, `DATEPOSTED`

	$company = new Company();
	$comp = $company->single_company($jobreg->COMPANYID);
	 // `COMPANYNAME`, `COMPANYADDRESS`, `COMPANYCONTACTNO`

	$sql = "SELECT * FROM `tblattachmentfile` WHERE `FILEID`=" .$jobreg->FILEID;
	$mydb->setQuery($sql);
	$attachmentfile = $mydb->loadSingleResult();


?> 
<style type="text/css">
.content-header {
	min-height: 50px;
	border-bottom: 1px solid #ddd;
	font-size: 20px;
	font-weight: bold;
}
.content-body {
	min-height: 350px;
	/*border-bottom: 1px solid #ddd;*/
}
.content-body >p {
	padding:10px;
	font-size: 12px;
	font-weight: bold;
	border-bottom: 1px solid #ddd;
}
.content-footer {
	min-height: 100px;
	border-top: 1px solid #ddd;

}
.content-footer > p {
	padding:5px;
	font-size: 15px;
	font-weight: bold; 
}
 
.content-footer textarea {
	width: 100%;
	height: 200px;
}
.content-footer  .submitbutton{  
	margin-top: 20px;
	/*padding: 0;*/

}
</style>
<form action="controller.php?action=approve" method="POST">
<br>
<div class="col-sm-12 content-header" style="">Xem chi tiết</div>
<div class="col-sm-12 content-body" >  
	<h3>Công việc: <?php echo $job->OCCUPATIONTITLE; ?></h3>
	<input type="hidden" name="JOBREGID" value="<?php echo $jobreg->REGISTRATIONID;?>">

	<div class="col-sm-6">
		<ul>
            <li><i class="fp-ht-bed"></i>Số nhân viên yêu cầu : <?php echo $job->REQ_NO_EMPLOYEES; ?></li>
            <li><i class="fp-ht-food"></i>Lương : <?php echo number_format($job->SALARIES,0);  ?> triệu / tháng</li>
            <li><i class="fa fa-sun-"></i>Thời gian làm việc : <?php echo $job->DURATION_EMPLOYEMENT; ?></li>
        </ul>
	</div> 
	<div class="col-sm-6">
		<ul> 
            <li><i class="fp-ht-tv"></i>Yêu cầu giới tính : <?php echo $job->PREFEREDSEX; ?></li>
            <li><i class="fp-ht-computer"></i>Ngành tuyển dụng : <?php echo $job->SECTOR_VACANCY; ?></li>
        </ul>
	</div>
	<div class="col-sm-12">
		<p>Mô tả công việc : </p>   
		<p style="margin-left: 15px;"><?php echo $job->JOBDESCRIPTION;?></p>
	</div>
	<div class="col-sm-12"> 
		<p>Bằng cấp / Kinh nghiệm làm việc : </p>
		<p style="margin-left: 15px;"><?php echo $job->QUALIFICATION_WORKEXPERIENCE; ?></p>
	</div>
	<div class="col-sm-12"> 
		<p>Người thuê lao động : </p>
		<p style="margin-left: 15px;">Tên công ty: <?php echo $comp->COMPANYNAME ; ?></p> 
		<p style="margin-left: 15px;">Địa chỉ: <?php echo $comp->COMPANYADDRESS ; ?></p>
	</div>
</div>
 
<div class="col-sm-12 content-footer">
<p><i class="fa fa-paperclip"></i>Tệp đính kèm</p>
	<div class="col-sm-12 slider">
		 <h3>Xem hồ sơ của bạn <a href="<?php echo web_root.'applicant/'.$attachmentfile->FILE_LOCATION; ?>">tại đây</a></h3>
	</div>  
	<div class="col-sm-12">
		<b><p>Thông báo: </p></b>
		<p><?php echo isset($jobreg->REMARKS) ? $jobreg->REMARKS : ""; ?></p>
	</div>
	<div class="col-sm-12  submitbutton "> 
		<a href="index.php?view=appliedjobs" class="btn btn-primary fa fa-arrow-left"> Trở về</a>
	</div> 
</div>
</form>
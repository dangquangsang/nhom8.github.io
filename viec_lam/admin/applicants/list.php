<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
?> 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách các ứng viên<!-- <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Thêm nhân viên mới</a> --></h1>
    </div>
</div>
<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   		
	<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">
		<thead>
			<tr>
				<th>Người xin việc</th>
				<th>Liên hệ ứng viên</th>
				<th>Công việc</th>
				<th>Công ty</th>
				<th>Ngày nộp</th> 
				<th width="9%" >Hoạt động</th> 
			</tr>	
		</thead> 
		<tbody>
			<?php   
				// $mydb->setQuery("SELECT * FROM  `tblusers` WHERE TYPE != 'Customer'");
				$mydb->setQuery("SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` ");
				$cur = $mydb->loadResultList();
				foreach ($cur as $result) { 
					echo '<tr>';
					// echo '<td width="5%" align="center"></td>';
					echo '<td>'. $result->APPLICANT.'</td>';
					echo '<td>'. $result->EMAILADDRESS.'</td>'; 
					echo '<td>'. $result->OCCUPATIONTITLE.'</a></td>';
					echo '<td >'. $result->COMPANYNAME.'</a></td>'; 
					echo '<td>'. $result->REGISTRATIONDATE.'</td>'; 
					echo '<td align="center" >    
					  			<a title="Xem" href="index.php?view=view&id='.$result->REGISTRATIONID.'" class="btn btn-info btn-xs  ">
					  				<span class="fa fa-info fw-fa"></span> Xem
								</a> 
							</td>';
					echo '</tr>';
				} 
			?>
		</tbody>
	</table>
</form>

<!-- <a title="Xóa" href="controller.php?action=delete&id='.$result->REGISTRATIONID.'" class="btn btn-danger btn-xs  ">
	<span class="fa fa-trash-o fw-fa"></span> Xóa
</a>  -->
                 
 
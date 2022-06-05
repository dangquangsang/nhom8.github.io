<?php 
	  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     } 
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách các vị trí tuyển dụng  <a href="index.php?view=add" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle fw-fa"></i> Thêm vị trí tuyển dụng</a></h1>
    </div>
</div>
<form action="controller.php?action=delete" Method="POST">  	
	<div class="table-responsive">					
		<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
			<thead>
				<tr>
				  	<th>Tên công ty</th> 
					<th>Công việc</th> 
					<th>Số lượng cần tuyển</th>
			  		<th>Tiền lương</th> 
			  		<th>Thời gian làm việc</th> 
			  		<th>Trình độ chuyên môn / Kinh nghiệm làm việc</th> 
			  		<th>Mô tả công việc</th> 
					<th>Yêu cầu giới tính</th> 
				  	<th>Ngành tuyển dụng</th> 
				  	<!-- <th>Tình trạng công việc</th>  -->
				  	<th width="10%" align="center">Hoạt động</th>
				</tr>	
			</thead> 
			<tbody>
				<?php 
					$mydb->setQuery("SELECT * FROM `tbljob` j, `tblcompany` c WHERE j.COMPANYID=c.COMPANYID");
				  	$cur = $mydb->loadResultList(); 
					foreach ($cur as $result) {
				  		echo '<tr>';
				  			echo '<td>' . $result->COMPANYNAME.'</td>';
				  			echo '<td>' . $result->OCCUPATIONTITLE.'</td>';
				  			echo '<td style="text-align: center;">' . $result->REQ_NO_EMPLOYEES.'</td>';
				  			echo '<td style="text-align: center;">' . $result->SALARIES.' triệu </td>';
				  			echo '<td>' . $result->DURATION_EMPLOYEMENT.'</td>';
				  			echo '<td>' . $result->QUALIFICATION_WORKEXPERIENCE.'</td>';
				  			echo '<td>' . $result->JOBDESCRIPTION.'</td>';
				  			echo '<td style="text-align: center;">' . $result->PREFEREDSEX.'</td>';
				  			echo '<td>' . $result->SECTOR_VACANCY.'</td>';
				  			/* echo '<td>' . $result->JOBSTATUS.'</td>'; */
				  			echo '<td align="center">
							  	<a title="Edit" href="index.php?view=edit&id='.$result->JOBID.'" class="btn btn-primary btn-xs  ">  
							  		<span class="fa fa-edit fw-fa">
								</a>
				  		     	<a title="Delete" href="controller.php?action=delete&id='.$result->JOBID.'" class="btn btn-danger btn-xs  ">  
								   <span class="fa  fa-trash-o fw-fa ">
								</a>
							</td>';
				  		echo '</tr>';
				  	} 
				?>
			</tbody>
		</table>
	</div>
	<div class="btn-group">
		<?php
			if($_SESSION['ADMIN_ROLE']=='Administrator'){
			;}
		?>
	</div>
</form> 
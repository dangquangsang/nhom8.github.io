<?php
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
    $jobid = $_GET['id'];
    $job = New Jobs();
    $res = $job->single_job($jobid);
?> 
<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Cập nhật vị trí tuyển dụng</h1>
    </div>
  </div> 

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="COMPANYNAME">Tên công ty:</label>
      <div class="col-md-8">
        <input type="hidden" name="JOBID" value="<?php echo $res->JOBID;?>">
        <select class="form-control input-sm" id="COMPANYID" name="COMPANYID">
          <option value="None">Lựa chọn</option>
            <?php 
              $sql ="Select * From tblcompany WHERE COMPANYID=".$res->COMPANYID;
              $mydb->setQuery($sql);
              $result  = $mydb->loadResultList();
              foreach ($result as $row) {
                echo '<option SELECTED value='.$row->COMPANYID.'>'.$row->COMPANYNAME.'</option>';
              }
              $sql ="Select * From tblcompany WHERE COMPANYID!=".$res->COMPANYID;
              $mydb->setQuery($sql);
              $result  = $mydb->loadResultList();
              foreach ($result as $row) {
                echo '<option value='.$row->COMPANYID.'>'.$row->COMPANYNAME.'</option>';
              }
            ?>
        </select>
      </div>
    </div>
  </div>  

  <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="CATEGORY">Công việc:</label>
        <div class="col-md-8"> 
          <select class="form-control input-sm" id="CATEGORY" name="CATEGORY">
            <option value="None">Lựa chọn</option>
            <?php 
              $sql ="SELECT * FROM `tblcategory` WHERE CATEGORY='".$res->CATEGORY."'";
              $mydb->setQuery($sql);
              $cur  = $mydb->loadResultList();
              foreach ($cur as $result) {
                echo '<option SELECTED value='.$result->CATEGORYID.'>'.$result->CATEGORY.'</option>';
              }
              $sql ="SELECT * FROM `tblcategory` WHERE CATEGORY!='".$res->CATEGORY."'";
              $mydb->setQuery($sql);
              $cur  = $mydb->loadResultList();
              foreach ($cur as $result) {
                echo '<option value='.$result->CATEGORYID.'>'.$result->CATEGORY.'</option>';
              }
            ?>
          </select>
        </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="OCCUPATIONTITLE">Chức danh nghề nghiệp:</label> 
      <div class="col-md-8">
        <input class="form-control input-sm" id="OCCUPATIONTITLE" name="OCCUPATIONTITLE" placeholder="Chức danh nghề nghiệp"   autocomplete="none" value="<?php echo $res->OCCUPATIONTITLE; ?>"/> 
      </div>
    </div>
  </div>  

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="REQ_NO_EMPLOYEES">Số nhân viên yêu cầu:</label> 
      <div class="col-md-8">
        <input class="form-control input-sm" id="REQ_NO_EMPLOYEES" name="REQ_NO_EMPLOYEES" placeholder="Số nhân viên yêu cầu" autocomplete="none" value="<?php echo $res->REQ_NO_EMPLOYEES ?>"/> 
      </div>
    </div>
  </div>  

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="SALARIES">Lương:</label> 
      <div class="col-md-8">
        <input class="form-control input-sm" id="SALARIES" name="SALARIES" placeholder="Lương" autocomplete="none" value="<?php echo $res->SALARIES ?>"/> 
      </div>
    </div>
  </div>  

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="DURATION_EMPLOYEMENT">Thời gian làm việc:</label> 
      <div class="col-md-8">
        <input class="form-control input-sm" id="DURATION_EMPLOYEMENT" name="DURATION_EMPLOYEMENT" placeholder="Thời gian làm việc" autocomplete="none" value="<?php echo $res->DURATION_EMPLOYEMENT ?>"/> 
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="QUALIFICATION_WORKEXPERIENCE">Bằng cấp / Kinh nghiệm làm việc:</label> 
      <div class="col-md-8">
        <textarea class="form-control input-sm" id="QUALIFICATION_WORKEXPERIENCE" name="QUALIFICATION_WORKEXPERIENCE" placeholder="Bằng cấp / Kinh nghiệm làm việc"   autocomplete="none" ><?php echo $res->QUALIFICATION_WORKEXPERIENCE ?></textarea> 
      </div>
    </div>
  </div> 

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for= "JOBDESCRIPTION">Mô tả công việc:</label> 
      <div class="col-md-8">
        <textarea class="form-control input-sm" id="JOBDESCRIPTION" name="JOBDESCRIPTION" placeholder="Mô tả công việc"   autocomplete="none"><?php echo $res->JOBDESCRIPTION ?></textarea> 
      </div>
    </div>
  </div>  

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="PREFEREDSEX">Yêu cầu giới tinh:</label> 
      <div class="col-md-8">
        <select class="form-control input-sm" id="PREFEREDSEX" name="PREFEREDSEX">
          <option value="Null">Lựa chọn</option>
          <option <?php echo ($res->PREFEREDSEX=='Nam') ? "SELECTED" :"" ?>>Nam</option>
          <option <?php echo ($res->PREFEREDSEX=='Nữ') ? "SELECTED" :"" ?>>Nữ</option>
          <option <?php echo ($res->PREFEREDSEX=='Không') ? "SELECTED" :"" ?>>Không</option>
        </select>
      </div>
    </div>
  </div>  

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="SECTOR_VACANCY">Ngành tuyển dụng:</label> 
      <div class="col-md-8">
        <textarea class="form-control input-sm" id="SECTOR_VACANCY" name="SECTOR_VACANCY" placeholder="Ngành tuyển dụng"   autocomplete="none"><?php echo $res->SECTOR_VACANCY ?></textarea> 
      </div>
    </div>
  </div>  
 
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="idno"></label>  
      <div class="col-md-8">
        <button class="btn btn-primary btn-sm" name="save" type="submit" ><!-- <span class="fa fa-save fw-fa"> --></span> Cập nhật</button>
      </div>
      </div>
    </div> 
  </form>
       
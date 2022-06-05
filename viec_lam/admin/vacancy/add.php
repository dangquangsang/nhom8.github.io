
<?php
     if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?>
<form class="form-horizontal span6" action="controller.php?action=add" method="POST">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Thêm công việc</h1>
    </div>
  </div> 
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="COMPANYNAME">Tên công ty:</label>
        <div class="col-md-8">
          <select class="form-control input-sm" id="COMPANYID" name="COMPANYID">
            <option value="None">Lựa chọn</option>
              <?php 
                $sql ="Select * From tblcompany";
                $mydb->setQuery($sql);
                $res  = $mydb->loadResultList();
                foreach ($res as $row) {
                    echo '<option value='.$row->COMPANYID.'>'.$row->COMPANYNAME.'</option>';
                }
              ?>
          </select>
        </div>
      </div>
    </div>  

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="CATEGORY">Công việc :</label>
          <div class="col-md-8">
            <select class="form-control input-sm" id="CATEGORY" name="CATEGORY">
                <option value="None">Lựa chọn</option>
                  <?php 
                    $sql ="Select * From tblcategory";
                    $mydb->setQuery($sql);
                    $res  = $mydb->loadResultList();
                    foreach ($res as $row) {
                      echo '<option value='.$row->CATEGORYID.'>'.$row->CATEGORY.'</option>';
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
            <input class="form-control input-sm" id="OCCUPATIONTITLE" name="OCCUPATIONTITLE" placeholder="Chức danh nghề nghiệp"   autocomplete="none"/> 
          </div>
        </div>
      </div>  

      <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for="REQ_NO_EMPLOYEES">Số nhân viên yêu cầu:</label> 
          <div class="col-md-8">
            <input class="form-control input-sm" id="REQ_NO_EMPLOYEES" name="REQ_NO_EMPLOYEES" placeholder="Số nhân viên yêu cầu"   autocomplete="none"/> 
          </div>
        </div>
      </div>  

      <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for="SALARIES">Lương:</label> 
          <div class="col-md-8">
            <input class="form-control input-sm" id="SALARIES" name="SALARIES" placeholder="Lương" autocomplete="none"/> 
          </div>
        </div>
      </div>  

      <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for="DURATION_EMPLOYEMENT">Thời gian làm việc:</label> 
          <div class="col-md-8">
            <input class="form-control input-sm" id="DURATION_EMPLOYEMENT" name="DURATION_EMPLOYEMENT" placeholder="Thời gian làm việc"   autocomplete="none"/> 
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for="QUALIFICATION_WORKEXPERIENCE">Bằng cấp / Kinh nghiệm làm việc :</label> 
          <div class="col-md-8">
            <textarea class="form-control input-sm" id="QUALIFICATION_WORKEXPERIENCE" name="QUALIFICATION_WORKEXPERIENCE" placeholder="Bằng cấp / Kinh nghiệm làm việc"   autocomplete="none"></textarea> 
          </div>
        </div>
      </div> 

      <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for="JOBDESCRIPTION">Mô tả công việc:</label> 
          <div class="col-md-8">
            <textarea class="form-control input-sm" id="JOBDESCRIPTION" name="JOBDESCRIPTION" placeholder="Mô tả công việc" autocomplete="none"></textarea> 
          </div>
        </div>
      </div>  

      <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for="PREFEREDSEX">Yêu cầu giới tính:</label> 
          <div class="col-md-8">
            <select class="form-control input-sm" id="PREFEREDSEX" name="PREFEREDSEX">
                <option value="None">Lựa chọn</option>
                <option>Nam</option>
                <option>Nữ</option>
                <option>Không</option>
            </select>
          </div>
        </div>
      </div>  

      <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for="SECTOR_VACANCY">Ngành tuyển dụng:</label> 
            <div class="col-md-8">
              <textarea class="form-control input-sm" id="SECTOR_VACANCY" name="SECTOR_VACANCY" placeholder="Ngành tuyển dụng"   autocomplete="none"></textarea> 
            </div>
          </div>
        </div>   

        <!-- <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for="SECTOR_VACANCY">Tình trạng công việc:</label> 
            <div class="col-md-8">
              <textarea class="form-control input-sm" id="SECTOR_VACANCY" name="SECTOR_VACANCY" placeholder="Tình trạng công việc"   autocomplete="none"></textarea> 
            </div>
          </div>
        </div> -->   
                  
        <div class="form-group">
          <div class="col-md-8">
            <label class="col-md-4 control-label" for="idno"></label>  
            <div class="col-md-8">
              <button class="btn btn-primary btn-sm" name="save" type="submit" ><!-- <span class="fa fa-save fw-fa"></span> --> Thêm</button>
              <a href="index.php" class="btn btn-primary btn-sm"><!-- <span class="glyphicon glyphicon-arrow-left"> -->Trở về</a>
            </div>
          </div>
        </div> 
</form>
      
 
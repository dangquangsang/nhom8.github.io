<?php 
  $id = isset($_GET['id']) ? $_GET['id'] :0;
  $sql="UPDATE `tbljobregistration` SET HVIEW=1 WHERE `REGISTRATIONID`='{$id}'";
  $mydb->setQuery($sql);
  $mydb->executeQuery();
  $sql = "SELECT * FROM `tblcompany` c,`tbljobregistration` jr,  `tbljob` j  WHERE c.`COMPANYID`=jr.`COMPANYID` AND jr.`JOBID`=j.`JOBID` AND `REGISTRATIONID`='{$id}'";
  $mydb->setQuery($sql);
  $res = $mydb->loadSingleResult();
  $applicant = new Applicants();
  $appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);
?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Đọc tin nhắn</h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h5>Công việc: <?php  echo $res->OCCUPATIONTITLE; ?></h5>
                <h5>Từ: <?php  echo $res->COMPANYNAME; ?>
                  <span class="mailbox-read-time pull-right"> Ngày phản hồi: <?php  echo date_format(date_create($res->DATETIMEAPPROVED),'d-m-Y'); ?></span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                </div>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p>Chào bạn <?php  echo $appl->LNAME; ?>,</p>  
                  <p><?php  echo $res->REMARKS; ?></p>

                <p>Cảm ơn !!! <br><?php  echo $res->COMPANYNAME; ?></p>
              </div>
            </div>
            <div class="box-footer">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
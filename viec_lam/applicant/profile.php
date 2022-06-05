<?php   
    $view = isset($_GET['view']) ? $_GET['view'] :"";  
	  $appl = New Applicants();
	  $applicant = $appl->single_applicant($_SESSION['APPLICANTID']); 
  ?>
  <style type="text/css">
    .panel-body img{
      width: 100%;
      height: 50%;
    }
    .panel-body img:hover{
      cursor: pointer;
    }
  </style>
<section id="inner-headline">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <h2 class="pageTitle">Hồ sơ</h2>
          </div>
      </div>
  </div>
</section>
<div class="container" style="margin-top: 10px;min-height: 600px;">
  <div class="row">
    <div class="col-sm-3">
      <div class="panel panel-default">            
        <div class="panel-body"> 
          <div  id="image-container">
            <img title="profile image"  data-target="#myModal"  data-toggle="modal"  src="<?php echo web_root.'applicant/'.$applicant->APPLICANTPHOTO; ?>">  
          </div>
        </div>
        <ul class="list-group">
          <li class="list-group-item text-muted"><strong>Hồ sơ</strong></li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Họ tên: </strong></span> 
            <?php echo $applicant->FNAME .' '.$applicant->MNAME.' '.$applicant->LNAME; ?> 
          </li>
        </ul> 
        <div class="box box-solid">  
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked"> 
              <li class="<?php echo ($view=='appliedjobs' || $view=='') ? 'active': '';?>">
                <a href="<?php echo web_root.'applicant/index.php?view=appliedjobs'; ?>">
                  <i class="fa fa-list"></i> Công việc đã ứng tuyển
                </a>
              </li>
              <li class="<?php echo ($view=='accounts') ? 'active': '';?>"><a href="<?php echo web_root.'applicant/index.php?view=accounts'; ?>"><i class="fa fa-user"></i> Tài khoản</a></li>
              <li class="<?php echo ($view=='message') ? 'active': '';?>"><a href="<?php echo web_root.'applicant/index.php?view=message'; ?>"><i class="fa fa-envelope-o"></i> Tin nhắn
                <span class="label label-success pull-right"><?php echo isset($showMsg->COUNT) ? $showMsg->COUNT : 0;?></span></a>
              </li>
              <!--<li class="<?php echo ($view=='notification') ? 'active': '';?>"><a href="<?php echo web_root.'applicant/index.php?view=notification'; ?>"><i class="fa fa-bell-o"></i> Notification
              <span class="label label-success pull-right"><?php echo $notif; ?></span></a></li> -->
            </ul>
          </div>
        </div>
      </div>
    </div> 
    <div class="col-sm-9">
      <?php
        check_message();  
        check_active(); 
      ?>
    <!-- <h1><?php echo $applicant->FNAME .' '.$applicant->MNAME.' '.$applicant->LNAME; ?>  </h1> -->
    <?php 
      switch ($view) {
        case 'message':
          require_once("message.php");
          break;
        case 'notification':
          require_once("notification.php");
          break;
        case 'appliedjobs':
          require_once("appliedjobs.php");
          break;
        case 'accounts':
          require_once("accounts.php");
          break;   
        default:
          require_once("appliedjobs.php");
          break;
      }
    ?>  
    </div>
  </div>
</div>
<?php  
  unset($_SESSION['appliedjobs']);
  unset($_SESSION['accounts']); 
?>
<div class="modal fade" id="myModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal" type="button">×</button>
        <h4 class="modal-title" id="myModalLabel">Chọn hình ảnh</h4>
      </div>
      <form action="controller.php?action=photos" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="form-group">
            <div class="rows">
              <div class="col-md-12">
                <div class="rows">
                  <div class="col-md-8">
                    <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> 
                    <input id="photo" name="photo" type="file">
                  </div>
                  <div class="col-md-4"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" type="button">Đóng</button> 
          <button class="btn btn-primary" name="savephoto" type="submit">Tải ảnh lên</button>
        </div>
      </form>
    </div>
  </div>
</div>

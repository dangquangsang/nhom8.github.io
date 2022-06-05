<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Việc làm / <?php echo $title;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="http://webthemez.com" />
  <!-- css -->
  <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="<?php echo web_root; ?>plugins/home-plugins/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo web_root; ?>plugins/home-plugins/css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
  <link href="<?php echo web_root; ?>plugins/home-plugins/css/flexslider.css" rel="stylesheet" /> 
  <link href="<?php echo web_root; ?>plugins/home-plugins/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo web_root;?>plugins/font-awesome/css/font-awesome.min.css"> 

  <link rel="stylesheet" href="<?php echo web_root;?>plugins/dataTables/jquery.dataTables.min.css"> 
  <link rel="stylesheet" href="<?php echo web_root;?>plugins/dataTables/jquery.dataTables_themeroller.css"> 
  <!-- datetime picker CSS -->
  <link href="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo web_root; ?>plugins/datepicker/datepicker3.css" rel="stylesheet" media="screen">
  
  <style type="text/css">
    #content {
      min-height: 400px;
      color: #000;
    }
    
    .contentbody p {
      font-weight: bold;
    }
    .login a:hover{ 
      color: #00bcd4;
      text-decoration: none;

    }
    .login a:focus{ 
      color: #00bcd4;
      text-decoration: none;

    }
    .login a { 
      font-size: 14px;
      color: #fff;
      padding:0px;
    }
</style>
</head>
<body>
  <div id="wrapper" class="home-page">
    <header>
      <div class="topbar navbar-fixed-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12">      
              <p class="pull-left hidden-xs"><i class="fa fa-phone"></i>Điện thoại. (+84) 123-456 789-000</p>
                <?php if (isset($_SESSION['APPLICANTID'])) { 
                  $sql = "SELECT count(*) as 'COUNTNOTIF' FROM `tbljob` ORDER BY `DATEPOSTED` DESC";
                  $mydb->setQuery($sql);
                  $showNotif = $mydb->loadSingleResult();
                  $notif =isset($showNotif->COUNTNOTIF) ? $showNotif->COUNTNOTIF : 0;
                  $applicant = new Applicants();
                  $appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);
                  $sql ="SELECT count(*) as 'COUNT' FROM `tbljobregistration` WHERE `PENDINGAPPLICATION`=0 AND `HVIEW`=0 AND `APPLICANTID`='{$appl->APPLICANTID}'";
                  $mydb->setQuery($sql);
                  $showMsg = $mydb->loadSingleResult();
                  $msg =isset($showMsg->COUNT) ? $showMsg->COUNT : 0;
                  echo ' <p class="pull-right login"><a title="View Notification(s)" href="'.web_root.'applicant/index.php?view=notification"> <i class="fa fa-bell-o"></i> <span class="label label-success">'.$notif.'</span></a> | <a title="View Message(s)" href="'.web_root.'applicant/index.php?view=message"> <i class="fa fa-envelope-o"></i> <span class="label label-success">'.$msg.'</span></a> | <a title="View Profile" href="'.web_root.'applicant/"> <i class="fa fa-user"></i> Chào: '.$appl->LNAME .' </a> | <a href="'.web_root.'logout.php">  <i class="fa fa-sign-out"> </i>Đăng xuất</a> </p>';

                }else { ?>
                  <p class="pull-right login"><a data-target="#myModal" data-toggle="modal" href=""> <i class="fa fa-lock"></i> Đăng ký/Đăng nhập </a></p>
                <?php } ?>
            </div>
          </div>
        </div>
      </div> 
      <div style="min-height: 30px;"></div>
      <div class="navbar navbar-default navbar-static-top" > 
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo web_root; ?>index.php">Tìm kiếm <br> việc làm<!-- <img src="<?php echo web_root; ?>plugins/home-plugins/img/logo.png" alt="logo"/> --></a>
          </div>
          <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav">
                <li class="<?php echo !isset($_GET['q'])? 'active' :''?>"><a href="<?php echo web_root; ?>index.php">Trang chủ</a></li> 
                <li class="dropdown">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Tìm việc<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='advancesearch'){ echo 'active'; }else{ echo ''; }}  ?>">
                      <a href="<?php echo web_root; ?>index.php?q=advancesearch">Tìm kiếm tất cả</a>
                    </li>
                    <li>
                      <a href="<?php echo web_root; ?>index.php?q=search-company">Tìm kiếm theo công ty</a>
                    </li>
                    <li>
                      <a href="<?php echo web_root; ?>index.php?q=search-function">TÌm kiếm theo công việc</a>
                    </li>
                  </ul>
                </li> 
                <li class="dropdown <?php  if(isset($_GET['q'])) { if($_GET['q']=='category'){ echo 'active'; }else{ echo ''; }}  ?>">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle">Việc làm phổ biến 
                    <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu">
                    <?php 
                      $sql = "SELECT * FROM `tblcategory` LIMIT 10";
                      $mydb->setQuery($sql);
                      $cur = $mydb->loadResultList();
                      foreach ($cur as $result) {
                        if (isset($_GET['search'])) {
                          if ($result->CATEGORY==$_GET['search']) {
                            $viewresult = '<li class="active"><a href="'.web_root.'index.php?q=category&search='.$result->CATEGORY.'">'.$result->CATEGORY.' </a></li>';
                          } else {
                            $viewresult = '<li><a href="'.web_root.'index.php?q=category&search='.$result->CATEGORY.'">'.$result->CATEGORY.' </a></li>';
                          }
                        } else {
                          $viewresult = '<li><a href="'.web_root.'index.php?q=category&search='.$result->CATEGORY.'">'.$result->CATEGORY.' </a></li>';
                        } 
                      echo $viewresult;
                      }
                    ?> 
                  </ul>
                </li> 
                <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='company'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=company">Công ty</a></li>
                <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='hiring'){ echo 'active'; }else{ echo ''; }} ?>"><a href="<?php echo web_root; ?>index.php?q=hiring">Ứng tuyển ngay</a></li>
                <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='About'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=About">Về chúng tôi</a></li>
                <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='Contact'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=Contact">Liên hệ</a></li>
            </ul>
          </div>
        </div>
    </div>
  </header>
  <?php
    if (!isset($_SESSION['APPLICANTID'])) { 
      include("login.php");
    }
  ?>
  <?php
    if (isset($_GET['q'])) {
      echo '<section id="inner-headline">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="pageTitle">'.$title.'</h2>
            </div>
          </div>
        </div>
      </section>';
    }
    require_once $content;
  ?>   
  <!-- Footer -->
  <footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Liên hệ với chúng tôi</h5>
          <address>
          <strong>Công ty chúng tôi</strong><br>
          Số 182 Đường Lê Duẩn, Thành phố Vinh<br>
          Nghệ An, Việt Nam.</address>
          <p>
            <i class="icon-phone"></i> (+84) 123-456 789-000 <br>
            <i class="icon-envelope-alt"></i> nhomchungtoi@gmail.com
          </p>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Đường dẫn</h5>
          <ul class="link-list">
            <li><a href="<?php echo web_root; ?>index.php">Trang chủ</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=company">Công ty</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=hiring">Ứng tuyển ngay</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=About">Về chúng tôi</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=Contact">Liên hệ</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Bài viết mới nhất</h5>
          <ul class="link-list">
            <?php 
                  $sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID` ORDER BY DATEPOSTED DESC LIMIT 3" ;
                  $mydb->setQuery($sql);
                  $cur = $mydb->loadResultList();
                  foreach ($cur as $result) {
                    echo ' <li><a href="'.web_root.'index.php?q=viewjob&search='.$result->JOBID.'">'.$result->COMPANYNAME . ': '. $result->OCCUPATIONTITLE .'</a></li>';
                  } 
              ?> 
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="copyright">
            <p style="font-size: 15px;">
              <span>&copy; Website giới thiệu việc làm  
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="social-network">
            Liên hệ qua: 
            <li><a href="https://www.facebook.com/huyson.2410/" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.easing.1.3.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/bootstrap.min.js"></script>
 

<script type="text/javascript" src="<?php echo web_root; ?>plugins/dataTables/dataTables.bootstrap.min.js" ></script>  
<script src="<?php echo web_root; ?>plugins/datatables/jquery.dataTables.min.js"></script> 

<script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script> 

<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.fancybox-media.js"></script>  
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.flexslider.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/animate.js"></script>

<!-- Vendor Scripts -->
<script src="<?php echo web_root; ?>plugins/home-plugins/js/modernizr.custom.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.isotope.min.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/animate.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/custom.js"></script> 


<script type="text/javascript">
  $('#dash-table').DataTable({
    language: {
        processing: "Tải dữ liệu",
        search: "Tìm kiếm",
        lengthMenu: "Số lượng bản ghi trên 1 trang _MENU_ ",
        info: "Bản ghi từ _START_ đến _END_ tổng cộng _TOTAL_ bản ghi",
        infoEmpty: "Có 0 bản ghi trong 0 tổng cộng 0 ",
        infoFiltered: "(Không có dữ liệu)",
        loadingRecords: "",
        zeroRecords: "Không có dừ liệu mà bạn đang tìm kiếm",
        emptyTable: "Không có dữ liệu",
        paginate: {
            first: "Trang đầu",
            previous: "Trang trước",
            next: "Trang sau",
            last: "Trang cuối"
        }
      },
  });

  $("#btnlogin").click(function() {
    var username = document.getElementById("user_email");
    var pass = document.getElementById("user_pass");
    if(username.value=="" && pass.value==""){   
      $('#loginerrormessage').fadeOut(); 
      $('#loginerrormessage').fadeIn();  
      $('#loginerrormessage').css({ 
        "background" :"red",
        "color"      : "#fff",
        "padding"    : "5px;"
      }); 
      $("#loginerrormessage").html("Tên người dùng và mật khẩu không hợp lệ!");}
      else {
        $.ajax({
          type:"POST",  
          url: "process.php?action=login",    
          dataType: "text",  //expect html to be returned  
          data:{USERNAME:username.value,PASS:pass.value},               
          success: function(data){   
          // alert(data);
          $('#loginerrormessage').fadeOut(); 
          $('#loginerrormessage').fadeIn();  
          $('#loginerrormessage').css({ 
            "background" :"red",
            "color"      : "#fff",
            "padding"    : "5px;"
          }); 
          $('#loginerrormessage').html(data);} 
        }); 
      }
    });
    $('input[data-mask]').each(function() {
      var input = $(this);
      input.setMask(input.data('mask'));
    });

    $('#BIRTHDATE').inputmask({
      mask: "2/1/y",
      placeholder: "mm/dd/yyyy",
      alias: "date",
      hourFormat: "24"
    });
    $('#HIREDDATE').inputmask({
      mask: "2/1/y",
      placeholder: "mm/dd/yyyy",
      alias: "date",
      hourFormat: "24"
    });

    $('.date_picker').datetimepicker({
      format: 'mm/dd/yyyy',
      startDate : '01/01/1950', 
      language:  'en',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1, 
      startView: 2,
      minView: 2,
      forceParse: 0 
    });
</script> 
</body>
</html>
 
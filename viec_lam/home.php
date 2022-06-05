<section id="banner">
  <div id="main-slider" class="flexslider">
    <ul class="slides">
      <li>
        <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/1.jpg" alt="" />
        <div class="flex-caption">
          <h3>Sự đổi mới</h3> 
          <p>Chúng tôi tạo ra các cơ hội</p> 
        </div>
      </li>
      <li>
        <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/2.jpg" alt="" />
         <div class="flex-caption">
            <h3>Chuyên môn hóa</h3> 
            <p>Thành công phụ thuộc vào bạn</p> 
          </div>
        </li>
    </ul>
  </div>
</section> 
  <section id="call-to-action-2">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-9">
          <h3>Hợp tác với các nhà lãnh đạo doanh nghiệp</h3>
          <p>Phát triển các mối quan hệ thành công, lâu dài, chiến lược giữa khách hàng và nhà cung cấp,
             dựa trên việc đạt được thông lệ tốt nhất và lợi thế cạnh tranh bền vững. Trong mô hình đối tác kinh doanh,
             Các chuyên gia nhân sự làm việc chặt chẽ với các nhà lãnh đạo doanh nghiệp và quản lý trực tiếp để đạt được các mục tiêu chung của tổ chức.</p>
        </div>
      </div>
    </div>
  </section>
  <section id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aligncenter"><h2 class="aligncenter">Danh sách công ty</h2></div>
          <br/>
        </div>
      </div>
    <?php 
      $sql = "SELECT * FROM `tblcompany`";
      $mydb->setQuery($sql);
      $comp = $mydb->loadResultList();
      foreach ($comp as $company ) {
    ?>
    <div class="col-sm-4 info-blocks">
      <i class="icon-info-blocks fa fa-building-o"></i>
      <div class="info-blocks-in">
        <h3><?php echo $company->COMPANYNAME;?></h3>
        <!-- <p><?php echo $company->COMPANYMISSION;?></p> -->
        <p>Địa chỉ :<?php echo $company->COMPANYADDRESS;?></p>
        <p>Liên hệ tới. :<?php echo $company->COMPANYCONTACTNO;?></p>
      </div>
    </div>
    <?php } ?> 
  </div>
  </section>
  <section class="section-padding gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
            <h2 >Công việc phổ biến</h2>  
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 ">
          <?php 
            $sql = "SELECT * FROM `tblcategory`";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();
            foreach ($cur as $result) {
              echo '<div class="col-md-3" style="font-size:15px;padding:5px">* <a href="'.web_root.'index.php?q=category&search='.$result->CATEGORY.'">'.$result->CATEGORY.'</a></div>';
            }
          ?>
        </div>
      </div>
    </div>
  </section>    
  <section style="height: 473px" id="content-3-10" class="content-block data-section nopad content-3-10">
  <div style="height: 503px" class="image-container col-sm-6 col-xs-12 pull-left">
    <div class="background-image-holder">
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-6 col-xs-12 content">
        <div class="editContent">
          <h3>Đội ngũ của chúng tôi</h3>
        </div>
        <div class="editContent" style="height:235px;">
          <p> 
            &nbsp;&nbsp;Thái độ "một đội" của chúng tôi phá vỡ các silo và giúp chúng tôi tương tác hiệu quả như nhau từ C-suite đến tuyến đầu. Phong cách làm việc hợp tác của chúng tôi đề cao tinh thần đồng đội, sự tin tưởng và lòng khoan dung đối với các ý kiến khác nhau. Mọi người nói với chúng tôi rằng chúng tôi là người bình dị, dễ gần và vui vẻ.<br/><br/>
            &nbsp;&nbsp;Chúng tôi có niềm đam mê với kết quả thực sự của khách hàng và một động lực hành động thực tế bắt đầu từ 8 giờ sáng Thứ Hai và không bỏ cuộc. Chúng tôi tập hợp khách hàng bằng năng lượng truyền nhiễm của mình, để tạo ra sự thay đổi.<br/><br/>
          </p>
        </div> 
      </div>
    </div>
  </div>
</section>

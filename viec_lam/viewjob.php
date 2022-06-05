<style>
    .div_1 {
        border-bottom: 1px solid #ddd;
        padding: 10px;
        font-size: 25px;
        font-weight: bold;
        color: #000;
        margin-bottom: 5px;
    }
</style>
<section id="content">
    <div class="container content">      
        <?php
            if (isset($_GET['search'])) {
            $jobid = $_GET['search'];
        }
        else {
            $jobid = '';
        }
            $sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID` AND JOBID LIKE '%" . $jobid ."%' ORDER BY DATEPOSTED DESC" ;
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();
            foreach ($cur as $result) {
        ?> 
        <div class="container">
             <div class="mg-available-rooms">
                    <h5 class="mg-sec-left-title">Ngày đăng: <?php echo date_format(date_create($result->DATEPOSTED),'d/m/Y'); ?></h5>
                        <div class="mg-avl-rooms">
                            <div class="mg-avl-room">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="#"><span class="fa fa-building-o" style="font-size: 50px"></span></a>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="div_1"><?php echo $result->OCCUPATIONTITLE ;?> 
                                        </div> 
                                        <div class="row contentbody">
                                            <div class="col-sm-6">
                                                <ul>
                                                    <li><i class="fp-ht-bed"></i>Số nhân viên yêu cầu : <?php echo $result->REQ_NO_EMPLOYEES; ?> người</li>
                                                    <li><i class="fp-ht-food"></i>Lương : <?php echo number_format($result->SALARIES);?> triệu / tháng</li>
                                                    <li><i class="fa fa-sun-"></i>Thời gian làm việc : <?php echo $result->DURATION_EMPLOYEMENT; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                                                <ul>
                                                    <li><i class="fp-ht-tv"></i>Yêu cầu giới tính : <?php echo $result->PREFEREDSEX; ?></li>
                                                    <li><i class="fp-ht-computer"></i>Ngành tuyển dụng : <?php echo $result->SECTOR_VACANCY; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-12">
                                                <p>Bằng cấp / Kinh nghiệm làm việc:</p>
                                                 <ul style="list-style: none;"> 
                                                    <li><?php echo $result->QUALIFICATION_WORKEXPERIENCE ;?></li> 
                                                </ul> 
                                            </div>
                                            <div class="col-sm-12"> 
                                                <p>Mô tả công việc:</p>
                                                <ul style="list-style: none;"> 
                                                     <li><?php echo $result->JOBDESCRIPTION; ?></li> 
                                                </ul> 
                                             </div>
                                            <div class="col-sm-12">
                                                <p>Người thuê lao động :  <?php echo  $result->COMPANYNAME; ?></p> 
                                                <p>Địa chỉ :  <?php echo  $result->COMPANYADDRESS; ?></p>
                                            </div>
                                        </div>
                                          <a href="<?php echo web_root; ?>index.php?q=apply&search=<?php echo $result->JOBID; ?>&view=personalinfo" class="btn btn-main btn-next-tab">Ứng tuyển ngay !</a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                </div>
            </div>                        
        <?php  } ?>    
    </div>
</section> 
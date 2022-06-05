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
            $category = $_GET['search'];
        }else{
     $category = '';
    }
    $sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID` AND CATEGORY LIKE '%" . $category ."%' ORDER BY DATEPOSTED DESC" ;
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();

    foreach ($cur as $result) { 
    ?>  
        <div class="panel panel-primary">
            <div class="panel-header">
                <div class="div_1"><a href="<?php echo web_root.'index.php?q=viewjob&search='.$result->JOBID;?>"><?php echo $result->OCCUPATIONTITLE ;?></a> 
            </div> 
        </div>
        <div class="panel-body contentbody">
            <div class="col-sm-10">
                <div class="col-sm-12">
                    <p>Bằng cấp / Kinh nghiệm làm việc :</p>
                    <ul style="list-style: none;"> 
                        <li><?php echo $result->QUALIFICATION_WORKEXPERIENCE ;?></li> 
                    </ul> 
                </div>
                <div class="col-sm-12"> 
                    <p>Mô tả công việc:</p>
                    <ul style="list-style: none;"> 
                        <li><?php echo $result->JOBDESCRIPTION ;?></li> 
                    </ul> 
                </div>
                <div class="col-sm-12">
                    <p>Người thuê lao động :  <?php echo  $result->COMPANYNAME ?></p>
                    <p>Địa chỉ :  <?php echo  $result->COMPANYADDRESS ?></p>  
                </div>
            </div>
            <div class="col-sm-2"> <a href="<?php echo web_root; ?>index.php?q=apply&search=<?php echo $result->JOBID;?>&view=personalinfo" class="btn btn-main btn-next-tab">Ứng tuyển ngay !</a></div>
        </div> 
        <div class="panel-footer">
            Ngày đăng :  <?php echo date_format(date_create($result->DATEPOSTED),'d/m/Y'); ?>
        </div>
    </div> 
    <?php  } ?>   
    </div>
</section>  

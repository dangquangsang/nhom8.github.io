<?php
  if (!isset($_SESSION['ADMIN_USERID'])){
    redirect(web_root."admin/index.php");
  }
?>
<form class="form-horizontal span6" action="controller.php?action=add" method="POST">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Thêm công ty mới</h1>
    </div>
  </div> 
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="COMPANYNAME">Tên công ty:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="COMPANYNAME" name="COMPANYNAME" placeholder="Tên công ty" type="text" value="" autocomplete="none">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="COMPANYADDRESS">Địa chỉ công ty:</label> 
      <div class="col-md-8">
        <textarea class="form-control input-sm" id="COMPANYADDRESS" name="COMPANYADDRESS" placeholder="Địa chỉ công ty" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
      </div>
    </div>
  </div> 
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="COMPANYCONTACTNO">Liên hệ công ty:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="COMPANYCONTACTNO" name="COMPANYCONTACTNO" placeholder="Số liên hệ công ty." type="text" value="" autocomplete="none">
      </div>
    </div>
  </div>  
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
      
 
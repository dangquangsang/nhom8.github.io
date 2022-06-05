<div class="modal fade" id="myModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal" type="button">×</button>
        <h4 style="font-size: 20px" class="modal-title" id="myModalLabel" >Đăng nhập</h4>
      </div>
      <div class="modal-body hold-transition login-page">
        <div id="loginerrormessage"></div>
          <div class="login-box"> 
            <div class="login-box-body" style="border: solid 1px #ddd;padding: 35px;min-height: 350px;"> 
              <form style="margin-top: 32px;" action="" method="post">
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" placeholder="Tài khoản" name="user_email" id="user_email">
                  <span class="fa fa-user form-control-feedback" style="margin-top: -22px;"></span>
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Mật khẩu" name="user_pass" id="user_pass">
                  <span class="fa fa-lock form-control-feedback" style="margin-top: -22px;"></span>
                </div>
                <div class="row">
                  <div class="col-xs-8">
                    <div class="checkbox icheck">
                      <label>
                        <input type="checkbox"> Nhớ mật khẩu
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-4"></div>
                </div>
              </form> 
              <a href="#">Quên mật khẩu</a><br>
              <a href="<?php echo web_root; ?>index.php?q=register" class="text-center">Đăng ký tài khoản cho thành viên mới</a>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal"> Đóng</button> 
          <button class="btn btn-primary"name="btnlogin" id="btnlogin"> Đăng nhập</button>
        </div>
      </div>
    </div>
  </div>
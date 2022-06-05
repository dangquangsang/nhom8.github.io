<section id="content">
    <div class="container content">    
     <p> <?php check_message();?></p>      
		<form class="row form-horizontal span6  wow fadeInDown" action="process.php?action=register" method="POST">
		<h2 class=" ">Thông tin cá nhân</h2>
		<div class="row"> 
			<div class="form-group">
				<div class="col-md-8">
				<label class="col-md-4 control-label" for="FNAME">Họ:</label>
					<div class="col-md-8">
					  <input name="JOBID" type="hidden" value="<?php echo $_GET['job'];?>">
					   <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder="Họ" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
					<label class="col-md-4 control-label" for="LNAME">Tên:</label>
					<div class="col-md-8">
					  <input name="deptid" type="hidden" value="">
					  <input  class="form-control input-sm" id="LNAME" name="LNAME" placeholder="Tên" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
					  </div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
					<label class="col-md-4 control-label" for="MNAME">Tên đệm:</label>
					<div class="col-md-8">
					  <input name="deptid" type="hidden" value="">
					  <input  class="form-control input-sm" id="MNAME" name="MNAME" placeholder="Tên đệm" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
					</div>
				</div>
			</div> 

			<div class="form-group">
				<div class="col-md-8">
					<label class="col-md-4 control-label" for="ADDRESS">Địa chỉ:</label>
					<div class="col-md-8">
					 <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder="Địa chỉ" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
					</div>
				</div>
			</div> 
			<div class="form-group">
				<div class="col-md-8">
					<label class="col-md-4 control-label" for="Gender">Giới tính:</label>
					<div class="col-md-8">
					 <div class="col-lg-5">
					    <div class="radio">
					      <label><input checked id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Nam">Nam</label>
					    </div>
					  </div>

					  <div class="col-lg-4">
					    <div class="radio">
					      <label><input id="optionsRadios2"   name="optionsRadios" type="radio" value="Nữ">Nữ</label>
					    </div>
					  </div> 
					</div>
				</div>
			</div>

			<div class="form-group">
			  <div class="rows">
			    <div class="col-md-8"> 
			      <div class="col-md-4">
			        <label class="col-lg-12 control-label">Ngày sinh :</label>
			      </div>
				  <div class="col-lg-3">
			        <select class="form-control input-sm" name="day">
			          <option>Ngày</option>
			        <?php 
			          $d = range(31, 1);
			          foreach ($d as $day) {
			            echo '<option value='.$day.'>'.$day.'</option>';
			          }	        
			        ?>          
			        </select>
			      </div>

			      <div class="col-lg-2">
			        <select class="form-control input-sm" name="month">
			          <option>Tháng</option>
			          <?php
			             $mon = array('Tháng 1' => 1 ,'Tháng 2'=> 2,'Tháng 3' => 3 ,'Tháng 4'=> 4,'Tháng 5' => 5 ,'Tháng 6'=> 6,'Tháng 7' => 7 ,'Tháng 8'=> 8,'Tháng 9' => 9 ,'Tháng 10'=> 10,'Tháng 11' => 11 ,'Tháng 12'=> 12 );    
			            foreach ($mon as $month => $value ) {
			                   echo '<option value='.$value.'>'.$month.'</option>';
			                } 
			          ?>
			        </select>
			      </div>

			      <div class="col-lg-3">
			        <select class="form-control input-sm" name="year">
			          <option>Năm</option>
			        <?php 
			          $years = range(2010, 1900);
			          foreach ($years as $yr) {
			            echo '<option value='.$yr.'>'.$yr.'</option>';
			          }
			        
			        ?>
			        
			        </select>
			      </div> 
			    </div>
			  </div>
			</div> 

			<div class="form-group">
			    <div class="col-md-8">
			      <label class="col-md-4 control-label" for="BIRTHPLACE">Nơi sinh:</label>
			      <div class="col-md-8">
			         <textarea class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE" placeholder="Nơi sinh" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
			      </div>
			    </div>
			  </div> 

			 <div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for="TELNO">Liên hệ:</label>
			    <div class="col-md-8">
			       <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder="Liên hệ" type="text" any value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
			    </div>
			  </div>
			</div> 

			 <div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for="CIVILSTATUS">Quốc tịch:</label>
			    <div class="col-md-8">
			      <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
			          <option value="Việt Nam" >Việt Nam</option>
			      </select> 
			    </div>
			  </div>
			</div>  

			 <div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "EMAILADDRESS">Địa chỉ Email:</label> 
			    <div class="col-md-8">
			       <input type="Email" class="form-control input-sm" id="EMAILADDRESS" name="EMAILADDRESS" placeholder="Địa chỉ Email"   autocomplete="false"/> 
			    </div>
			  </div>
			</div>  
			<div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for="USERNAME">Tài khoản:</label>
			    <div class="col-md-8">
			      <input name="deptid" type="hidden" value="">
			      <input  class="form-control input-sm" id="USERNAME" name="USERNAME" placeholder="Tài khoản" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
			      </div>
			  </div>
			</div>

			<div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for="PASS">Mật khẩu:</label>
			    <div class="col-md-8">
			      <input name="deptid" type="hidden" value="">
			      <input  class="form-control input-sm" id="PASS" name="PASS" placeholder="Mật khẩu" type="password" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
			    </div>
			  </div>
			</div> 
			<div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for="DEGREE">Trình độ học vấn:</label>
			    <div class="col-md-8">
			      <input name="deptid" type="hidden" value="">
			      <input  class="form-control input-sm" id="DEGREE" name="DEGREE" placeholder="Trình độ học vấn" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
			    </div>
			  </div>
			</div>  
			<div class="form-group">
			    <div class="col-md-8">
			      <label class="col-md-4 control-label" for=""></label>  
			      <div class="col-md-8"> 
			      	<label><input type="checkbox"> Bằng cách Đăng ký, bạn đồng ý với <a href="#">điều khoản và điều kiện</a></label>
			     </div>
			    </div>
			</div>    
			<div class="form-group">
			    <div class="col-md-8">
			      <label class="col-md-4 control-label" for="idno"></label>  
			      <div class="col-md-8">
			         <button class="btn btn-primary btn-sm" name="btnRegister" type="submit" ><!-- <span class="fa fa-save fw-fa"></span> --> Đăng ký</button>     
			     </div>
			    </div>
			</div>    
		</form>
	</div>
</section>
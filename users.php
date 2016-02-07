
<?php
	include_once("adb.php");

	class users extends adb {

		function get_user($id){
			$str_query = "select CUST_ID, USER_NAME, USER_TYPE from users where CUST_ID=$id";	
			if (!$this->query($str_query)){
			return false;
			}
			return $this->fetch();
		}

		function get_all_users(){
			$str_query = "select CUST_ID, USER_NAME, USER_TYPE from users";	
			return $this->query($str_query);
		}

}
	
?>
<?php

/**
*@author Adjoa Kwakye
**/
	include_once("adb1.php");
class wine1 extends adb1 {
	
	
 
	function wine1(){
	

	}
	
	
	function display_wine()
		{
			$str_query = "SELECT wine.wine_id,wine.wine_name, wine_type.wine_type, wine.year,winery.winery_name,wine.description from wine left join wine_type
			 on wine.wine_type=wine_type.wine_type_id left join winery on wine.winery_id=winery.winery_id "; 
			 $this->connect();
			 $stmt = $this->conn->prepare($str_query); 
			 $stmt->execute();
			 return $stmt;
			 	}
			 }

?>						   
				 

		

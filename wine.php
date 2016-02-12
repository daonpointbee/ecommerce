<?php
	include_once("adb.php");
	class wine extends adb{
		
		function wine() {
		}
		
		function add_wine($wname, $wtype, $year, $wineryid, $desc){
			$str_query = "INSERT into wine SET
							wine_name='$wname',
							wine_type='$wtype',
							year='$year',
							winery_id='$wineryid',
							description='$desc'";
			return $this->query($str_query);
		}
		function update_wine($wid, $wname, $wtype, $year, $wineryid, $desc){
			$str_query = "Update wine Set 
							wine_name='$wname',
							wine_type='$wtype',
							year='$year',
							winery_id='$wineryid',
							description='$desc'
							Where wine_id='$wid'";
			return $this->query($str_query);
		}
		function display_wine(){
		    $str_query =  "Select wine_id, wine_name, wine_type.wine_type, year, winery.winery_name 
			 				From `wine`, `winery`, `wine_type` 
			 				where wine.wine_type=wine_type.wine_type_id 
			 				AND wine.winery_id=winery.winery_id 
			 				order by wine_id";
			echo $limit;
			return $this->query($str_query);
		}
		
		function search_wine($wname){
			$str_query = "Select wine_id, wine_name, wine_type.wine_type, year, winery.winery_name from wine
							LEFT JOIN wine_type ON wine.wine_type=wine_type.wine_type_id
							LEFT JOIN winery ON wine.winery_id=winery.winery_id
							where wine_name like '%$wname%' order by wine_id";
			return $this->query($str_query);
		}
		
		function browse_wine($wtype){
			$str_query = "Select wine_id, wine_name, wine_type.wine_type, year, winery.winery_name 
							from wine LEFT JOIN wine_type ON wine.wine_type=wine_type.wine_type_id 
							LEFT JOIN winery ON wine.winery_id=winery.winery_id 
							where wine_type.wine_type_id like '$wtype' order by wine_id";
			return $this->query($str_query);
		}
		function view_wine_type(){
			$str_query= "select * from wine_type";
			return $this->query($str_query);
		}
		function view_wine($wid){
			$str_query = "select wine.wine_name, winery.winery_name, inventory.on_hand, inventory.cost, region.region_name,image
							From wine JOIN winery ON wine.winery_id=winery.winery_id 
							JOIN inventory ON wine.wine_id = inventory.wine_id 
							Join region ON region.region_id=winery.region_id 
							Where wine.wine_id='$wid'";
			return $this->query($str_query);
		}
		function sort_wine($selection) {
			$str_query =  "Select wine.wine_id, wine_name, wine_type.wine_type, year, winery.winery_name, inventory.cost
							from wine LEFT JOIN wine_type ON wine.wine_type=wine_type.wine_type_id
							LEFT JOIN winery ON wine.winery_id=winery.winery_id 
							LEFT Join inventory ON wine.wine_id=inventory.wine_id 
							order by $selection";
			return $this->query($str_query);
		}
		function search_user($name, $password){
			$str_query = "select * from user where user_name = '$name' and password='$password'";
			return $this->query($str_query);
		}
	
	}
	?>

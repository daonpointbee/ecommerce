<html>
	<head>
		<meta charset="UTF-8">
		<title>Add Wine</title>
	</head>
	<body>
	<form action="addwine.php" method="GET">
			<div>Wine Name : <input type="text" name="wn"> </div>
			<div>Wine Type : <select name = "wt">
			<option value="0">--Select Wine ID--</option>
            <option value="1">1</option>
            <option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option></select></div>
			<div>Year : <input type="text" name="yr"></div>
			<div> Winery ID: <input type="text" name = "wnid"></div>
			<div>Description : <input type="text" name="desc"></div>
			<div><input type="submit" value="add"> </div>
	</form>
		<?php
		if (!isset($_REQUEST['wn'])) {
		echo "Please insert at least the name of the wine to be added";
		exit();
	}
		if(isset($_REQUEST['wn'])){
			include("wine.php");
			$var= new wine();
			$name=$_REQUEST['wn'];
			$type=$_REQUEST['wt'];
			$year=$_REQUEST['yr'];
			$wineid=$_REQUEST['wnid'];
			$Desc=$_REQUEST['desc'];
			
			if(!$var->add_wine($name, $type, $year, $wineid, $Desc)) {
				echo mysql_error();
                echo "Error Inserting Equipment";
                
			}else{
				echo "$name successfully added to inventory";
			}	
		}
		?>
	</body>
</html>
		}
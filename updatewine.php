<?php
	// session_start();
	// if(!isset($_SESSION['USERNAME'])){
	// 	header("location:login.php");
	// }
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Edit Wine</title>
	</head>
	<body>
	<form action="updatewine.php" method="GET">
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
			<div>Image Path : <input type="text" name="img"></div>
			<div><input type="submit" value="Edit"> </div>
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
			$img=$_REQUEST['img'];
			
			if(!$var->update_wine($_REQUEST['wid'], $name, $type, $year, $wineid, $Desc, $img)) {
				echo mysql_error();
                echo "Error Updating wine details";
                
			}else{
				echo "$name successfully edited";
			}	
		}
		?>
	</body>
</html>
		}
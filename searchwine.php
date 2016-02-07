<?php
	/*session_start();
	if(!isset($_SESSION['USERNAME'])){
		header("location:login.php");
	}
	*/
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Search Wine</title>
		<link rel="stylesheet" href="css/style.css"><link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<a href="browsewine.php">Click to Browse by Category</a>
	<a href="addwine.php">Click to Add Wine</a>
	<div><a href="sortwine.php?wid=Cost">Click to Sort Wine</a></div>
		
		<?php
		include("wine.php");
		$var = new wine();
		$search_text = "";
		if (isset($_REQUEST['st'])) {
			$search_text=$_REQUEST['st'];
		}
		echo "<form action='searchwine.php' method='GET'>"
			."<input type='text' name='st' value='$search_text'>"
			."<input type='submit' value='search'>"
			."</form>";
		
		$var->search_wine($search_text);
			
		echo	"<table border = '10'>";
		echo	"<tr>";
		echo	"<td>Wine ID</td><td>Wine Name</td><td>Wine Type</td><td>Year</td><td>Winery</td>";
		echo	"</tr>";
		echo "<ol>";
		while ($var_row=$var->fetch()) {
				echo "<td><a href = 'viewwine.php?wid=".$var_row['wine_id']."'>".$var_row['wine_id']."</a></td>";
				echo "<td>".$var_row['wine_name']."</td>";
				echo "<td>".$var_row['wine_type']."</td>";
				echo "<td>".$var_row['year']."</td>";
				echo "<td>".$var_row['winery_name']."</td></tr>";
		}
		echo "</ol>";
		echo "</table>";
		
		?>
	</body>
</html>
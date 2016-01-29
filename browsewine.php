<html>
	<head>
		<meta charset="UTF-8">
		<title>Browse Wine</title>
	</head>
	<body>
	<div><a href="displaywine.php">Return to Home</a></div>
	<div><a href="sortwine.php?wid=Cost">Click to Sort Wine</a></div>
		<?php
		include("wine.php");
		$var = new wine();
		$var1 = new wine();
		$var->view_wine_type();
		$browse_text = "";
		if (isset($_REQUEST['wn'])) {
			$browse_text=$_REQUEST['wn'];
		}
		?>
		<table>
		<form action="browsewine.php" method="GET">
		<Select name="wn">
		<?php while($var_row=$var->fetchArray()):;?>
		<option <?php echo 'value ='.$var_row[0].'>'.$var_row[1];?></option>
		<?php endwhile;?>
		</select>
		<input type="submit"/>
		</form>
		</table>
		
		<?php
		$var1->browse_wine($browse_text);
		if ($var1==false){
			echo "error running query";
			exit();
		}
			
		echo	"<table border = '10'>";
		echo	"<tr>";
		echo	"<td>Wine ID</td><td>Wine Name</td><td>Wine Type</td><td>Year</td><td>Winery</td>";
		echo	"</tr>";
		echo "<ol>";
		
		while ($var1_row=$var1->fetch()) {
				echo "<tr><td>{$var1_row['wine_id']}</td>";
				echo "<td>{$var1_row['wine_name']}</td>";
				echo "<td>{$var1_row['wine_type']}</td>";
				echo "<td>{$var1_row['year']}</td>";
				echo "<td>{$var1_row['winery_name']}</td></tr>";
		}
		echo "</ol>";
		echo "</table>";
		
		?>
	</body>
</html>
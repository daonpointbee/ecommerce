<html>
	<head>
		<meta charset="UTF-8">
		<title>Sort Wine</title>
	</head>
		<body>
			<?php
			include("wine.php");
			$var1= new wine();
			?>
			
		<table>
		<form action="sortwine.php" method="GET">
		Sort By: <input type = "radio" name="wid" Value="Cost"> Price
		<input type = "radio" name="wid" Value ="wine_name"> Wine Name
		<input type="submit" value="Sort">
		</form>
		</table>
		<?php
		$var1->sort_wine($_REQUEST['wid']);
		echo	"<table border = '10'>";
		echo	"<tr>";
		echo	"<td>Wine ID</td><td>Wine Name</td><td>Wine Type</td><td>Year</td><td>Winery</td><td>Price</td>";
		echo	"</tr>";
		echo "<ol>";
		$var1_row=$var1->fetch();
		while ($var1_row) {
				echo "<tr><td>{$var1_row['wine_id']}</td>";
				echo "<td>{$var1_row['wine_name']}</td>";
				echo "<td>{$var1_row['wine_type']}</td>";
				echo "<td>{$var1_row['year']}</td>";
				echo "<td>{$var1_row['winery_name']}</td>";
				echo "<td>{$var1_row['cost']}</td></tr>";
				$var1_row=$var1->fetch();
		}
		echo "</ol>";
		echo "</table>";
		
		?>
	</body>
</html>
		
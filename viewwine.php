<html>
	<head>
		<meta charset="UTF-8">
		<title>Sort Wine</title>
	</head>
		<body>
		<a href="searchwine.php">Return to Home Page</a>;
			<?php
			include("wine.php");
			$var1= new wine();
			$var1->view_wine($_REQUEST['wid']);
		echo	"<table border = '10'>";
		echo	"<tr>";
		echo	"<td>Wine Name</td><td>Winery</td><td>Quantity</td><td>Price</td><td>Region</td>";
		echo	"</tr>";
		echo "<ol>";
		$var1_row=$var1->fetch();
		while ($var1_row) {
				echo "<tr><td>{$var1_row['wine_name']}</td>";
				echo "<td>{$var1_row['winery_name']}</td>";
				echo "<td>{$var1_row['on_hand']}</td>";
				echo "<td>{$var1_row['cost']}</td>";
				echo "<td>{$var1_row['region_name']}</td></tr>";
				$var1_row=$var1->fetch();
		}
		echo "</ol>";
		echo "</table>";
		
		?>
	</body>
</html>
		
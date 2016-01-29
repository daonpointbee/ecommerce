<html>
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
	</head>
	<body>
		<?php
		
		include("wine.php");
		$var = new wine();
		$var->display_wine();
		
		echo	"<table border = '10'>";
		echo	"<tr>";
		echo	"<td>Wine ID</td><td>Wine Name</td><td>Wine Type</td><td>Year</td><td>Winery</td>";
		echo	"</tr>";
		echo "<ol>";
		while ($row=$var->fetch()) {
				echo "<tr><td>".$row['wine_id']."</td>";
				echo "<td>".$row['wine_name']."</td>";
				echo "<td>".$row['wine_type']."</td>";
				echo "<td>".$row['year']."</td>";
				echo "<td>".$row['winery_name']."</td></tr>";
		}
		echo "</ol>";
		echo "</table>";
		?>
	</body>
</html>
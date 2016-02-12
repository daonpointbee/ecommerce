<?php

require_once './Twig/Autoloader.php';
Twig_Autoloader::register();
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
		



$loader = new Twig_Loader_Filesystem('./template');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('index.html');
$params = array(
	'Dbee' => $var_row
	);
$template->display($params);
?>


<?php
include_once("adb1.php");

include_once("wine1.php");
$obj = new wine1();
$stmt=$obj->display_wine();
	$stmt->bind_result($wineid,$winename,$winetype,$wineyear,$wineryname,$description);
	$dataarray = array();
	while ($stmt->fetch()) {
		$dataarray[]=array('wine_id'=>$wineid,'wine_name'=>$winename,'wine_type'=>$winetype,
			'year'=>$wineyear,'winery_name'=>$wineryname,'description'=>$description);
		
	
	}
	
$stmt->close();





require_once './Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('./newwinetemp');
$twig = new Twig_Environment($loader);
$template=$twig->loadTemplate('mywinetable.html'); 
$params=array('values'=>$dataarray);
$template->display($params);

?>
<?php
include("wine.php");
		$var = new wine();	
		$var->display_wine();
	
$data = array();
while($var_row = $var->fetchArray()){
$data[] = $var_row;
}

require_once './Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('./template');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('winetable.html');			
$params = array(

	'values' => $data,'Dbee' => 'Customized Website'
	);
$template->display($params);
?>
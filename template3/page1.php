<?php

require_once './Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('./template');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('winetable.tpl');
$params = array(
	'aName' => 'Daniel Bonsu');
$template->display($params);
?>
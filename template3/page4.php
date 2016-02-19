<?php

require_once './Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('./template');
$twig = new Twig_Environment($loader);


$num_perPage = 20;
if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $num_perPage;
include_once 'Admin.php';
$wine = new Admin ();

if ($result = $wine->displayWine($start_from, $num_perPage)) {
//    $row = $result->fetch_assoc();

    $num = $wine->countWine();
    $total = $num->fetch_assoc();
    $total_wines = $total["wine_id"];

    $total_pages = ceil($total_wines / $num_perPage);

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $data[] = $row;
    }
}

/** @var array $data */
/** @var integer $total_wines */
/** @var integer $total_pages */
echo $twig->render('/displayWines.html.twig', [

    'wines' => $data,
    'totalWines' => $total_wines,
    'page' => $page,
    'totalPages' => $total_pages

]);

<html>
<div><a href = 'session.php?c=1'>Counter1</a></div>
</html>

<?php

session_start();

$c=1;
$c=2;

if (!isset($_SESSION['count'])){
	$_SESSION['count'] = 0;

} else {

$_SESSION['count']++;

}


echo $_SESSION['count'];

?>

<div><a href = 'session.php?c=2'>Counter2</a></div>

<?php


 if $_GET['c'] ==2{
 session_start();

if (!isset($_SESSION['count'])){
	$_SESSION['count'] = 0;

} else {

$_SESSION['count']++;

}


echo $_SESSION['count'];	
 }



?>
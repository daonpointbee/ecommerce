<?php
          session_start();
          if(!isset($_SESSION['USER'])){
                  header("location: login.php");
                  exit();
  }
   ?>

<html>
   <head>
      <meta charset="UTF-8">
      <title>Add Wine</title>
      <script  src="jquery-2.1.3.js"> </script>
      <script  src="jquery-2.1.3.min.js"> </script>
          <script type="text/javascript">

                  function sendRequest(u){
                  // Send request to server
                  //u a url as a string
                  //async is type of request
                  var obj=$.ajax({url:u,async:false});
                  //Convert the JSON string to object
                  var result=$.parseJSON(obj.responseText);
                  return result;  //return object
                }
                
function logout(){
                  var theUrl="winecontrol.php?cmd=1";
                  var obj=sendRequest(theUrl);
                  if(obj.result==1){
                      window.location.href="login.php";
                  }
  }

          </script>
          <a href="paginationdisplaywine.php">Return to Home</a></div>
          <a href="sortwine.php?wid=Cost">Click to Sort Wine</a></div>
          <a href="searchwine.php">Search</a>
          <a href id="logout" onclick="logout()">Logout</a>
<?php

//1
if (isset($_GET['pageno'])) {
   $pageno = $_GET['pageno'];
} else {
   $pageno = 1;
} // if
//use single quotes instead of double on MAC if it doesnt work.--nna
$con=mysql_connect('localhost', 'root', '');
mysql_select_db("ecommerce", $con);

//2
$query = "SELECT count(*) FROM wine";
$result = mysql_query($query, $con) or die("error");//trigger_error("SQL", E_USER_ERROR);
$query_data = mysql_fetch_row($result);
$numrows = $query_data[0];

//3
$rows_per_page = 15;
$lastpage      = ceil($numrows/$rows_per_page);


//4
$pageno = (int)$pageno;
if ($pageno > $lastpage) {
   $pageno = $lastpage;
} // if
if ($pageno < 1) {
   $pageno = 1;
} // if

//5
$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;

//6
$query = "SELECT * FROM wine $limit";
$result = mysql_query($query, $con) or trigger_error("SQL", E_USER_ERROR);
//... process contents of $result ...
   echo  "<table border = '10'>";
      echo  "<tr>";
      echo  "<td>Wine ID</td><td>Wine Name</td><td>Wine Type</td><td>Year</td><td>Winery</td>";
      echo  "</tr>";
      echo   "<ol>";
while ($row=mysql_fetch_array($result)){

      echo  "<tr>";
      echo  "<td>{$row['wine_id']}</td><td>{$row['wine_name']}</td><td>{$row['wine_type']}</td><td>{$row['year']}</td><td>{$row['winery_id']}</td>";
      echo  "</tr>";
   echo   "<tr>";
}
echo  "</table>";

//7
if ($pageno == 1) {
   echo " FIRST PREV ";
} else {
   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=1'>FIRST</a> ";
   $prevpage = $pageno-1;
   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>PREV</a> ";
} // if

echo " ( Page $pageno of $lastpage ) ";
if ($pageno == $lastpage) {
   echo " NEXT LAST ";
} else {
   $nextpage = $pageno+1;
   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>NEXT</a> ";
   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>LAST</a> ";
} // if


?>

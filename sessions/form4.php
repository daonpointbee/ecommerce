	<?php
	session_start();

	if (isset($_POST['address'])){
		 $_SESSION['address'] = $_POST['address'];
		 echo $_SESSION['address'];
		}
	?>	
	
	
<html>

	<title>Address Form</title>

	<form method="POST" action="form4.php">
	Address :
	<input type="text" size="30" name="name"/>
	
	
	<input type="text" size="30" name="age"/>
	
	
	<input type="text" size="30" name="address"/>

	<div><a href = 'form3.php'>Previous</a></div>

	</form>
	
	</html>
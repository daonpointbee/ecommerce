	

	<?php
	session_start();

	if (isset($_POST['name'])){
		 $_SESSION['name'] = $_POST['name'];
		 echo $_SESSION['name'];
		}
	?>	

<html>

	<title>Age Form</title>

	<form method="POST" action="form3.php">
	Age :
	<input type="text" size="30" name="age"/>
	<input style="margin-left:30%;" type="submit" name="submit" value="<?php echo $_SESSION['age']?>"/>
	<a href = 'form1.php?=age'>Previous</a>
	</form>
	</html>
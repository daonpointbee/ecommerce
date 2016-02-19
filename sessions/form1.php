	

	<?php
	session_start();
	?>	

<html>

	<title>Name Form</title>

	<form method="POST" action="form2.php">
	Name :
	<input type="text" size="30" name="name"/>
	<input style="margin-left:30%;" type="submit" name="submit" value="<?php echo $_SESSION['name']?>"/>
	</form>
	</html>
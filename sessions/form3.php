	

	<?php
	session_start();

	if (isset($_POST['age'])){
		 $_SESSION['age'] = $_POST['age'];
		 echo $_SESSION['age'];
		}
	?>	

<html>

	<title>Address Form</title>

	<form method="POST" action="form4.php">
	Address :
	<input type="text" size="30" name="address"/>
	<input style="margin-left:30%;" type="submit" name="submit" value="<?php echo $_SESSION['address']?>"/>
	<div><a href = 'form2.php'>Previous</a></div>
	</form>
	</html>
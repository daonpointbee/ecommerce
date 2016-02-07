	<?php 
	session_start();
	if (isset($_SESSION['USER'])){
	        session_destroy();
	}   ?>


	<html>
	        <head>
	                        <title>Login</title>
	                <link rel="stylesheet" href="css/style.css">

	                        <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">

	        </head>
	        <body>
	        <div class="" style="     text-align:center;">
	    
	    
	<!--    <i class="fa fa-home">&nbsp; </i><i  class="fa" ><b>Inventory</b></i>-->
	                    </div>
	                    <div style="margin-left:40%; margin-top:10%;">
	                <form method="POST" action="login.php">
	                    <h3>Login to use system</h3>
	                    <h5><i>Username for admin is admin and password is test</i></h5>
	                     <h5><i>Username for regular user is regular and password is test</i></h5>
	                        Username :<input type="text" size="30" name="username"><br> 
	                        Password :<input type="password" size="30" name="pword"><br>
	                        <input style="margin-left:30%;" type="submit" value="sign in">
	</div>


		
				<?php

				include_once("adb.php");

					function load_profile($id){
						include_once("users.php");
						$obj=new users();
						$row=$obj->get_user($id);
						if (!$row){
							return false;
						}
						$_SESSION['USER']=$row;
						return true;
						}
		

				if (isset($_REQUEST["username"]) ) {
					if (isset($_REQUEST["pword"]) ) {


				$username=$_REQUEST['username'];
				$pword=$_REQUEST['pword'];


				$str_query="select cust_id, USER_TYPE from users WHERE user_name='$username' and password = MD5('$pword')";
				$obj = new adb();

				$obj->query($str_query);
					
				$row = $obj->fetch();

				if (!$row){
					echo "wrong user";
				}
				else{
					
					load_profile($row['cust_id']);
					//echo "data in the session is:";
					//print_r($_SESSION['USER']);

					 		if($_SESSION['USER']['USER_TYPE']=="ADMIN"){

					 		echo '<script>';

					 		echo 'window.location.replace("addwine.php")';

					 		echo '</script>'; 
	}
					 		 		if($_SESSION['USER']['USER_TYPE']=="REGULAR"){

					 		echo '<script>';

					 		echo 'window.location.replace("paginationdisplaywine.php")';

					 		echo '</script>'; 
					 		
	}

				}


	}}
			?>
		</body>
	</html>
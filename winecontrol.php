	<?php

	if(!isset($_REQUEST['cmd'])){
			echo '{"result":0,message:"unknown command"}';
			exit();
		}

		$cmd=$_REQUEST['cmd'];

		switch($cmd)
		{
		
			case 1:
				logout();
				break;
			default:
				echo '{"result":0,"message":"unknown command"}';
				break;
		}


		function logout(){
    session_start();
    if (isset($_SESSION['USER'])){
           session_destroy();
           
        echo '{"result":1,"message":"session destroyed"}';
    }   
}

	?>
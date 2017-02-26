<?php

	require_once('model/profil.php');
	
	function profil_action()
	{
		$error = ''; 
		if (!empty($_SESSION['user_id']))
	    {
	    	
		    if(add_file()){
		    	$error = $_SESSION['user_id'].'clique sur submit';
		    }
		    require_once('views/profil.php');
	    }else{
	    	header('Location: ?action=login');
	        exit(0);
	    }  
	}

?>
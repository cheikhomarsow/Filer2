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
		    
		    $my_files = my_files();

		    $formats = array();
		    foreach($my_files as $file){
		    	$formats[$file['file_name']] = file_extension($file['file_name']);
		    }

		    require_once('views/profil.php');
	    }else{
	    	header('Location: ?action=login');
	        exit(0);
	    }  
	}

?>
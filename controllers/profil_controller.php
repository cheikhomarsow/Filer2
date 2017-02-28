<?php

	require_once('model/profil.php');
	
	function profil_action()
	{
		$add_file_succes = ''; 
		$delete_file_succes = '';

		if (!empty($_SESSION['user_id']))
	    {
		    if(add_file()){
		    	$add_file_succes = 'Fichier ajouté avec succés';
		    }
		    
		    $my_files = my_files();
		    $formats = array();
		    foreach($my_files as $file){
		    	$formats[$file['file_name']] = file_extension($file['file_name']);
		    }

		    if(delete_file()){
		    	header('Location: ?action=profil');
		    }

		    require_once('views/profil.php');
	    }else{
	    	header('Location: ?action=login');
	        exit(0);
	    }  
	}

?>
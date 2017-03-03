<?php

	require_once('model/profil.php');
	
	function profil_action()
	{
		$add_file_succes = ''; 
		$delete_file_succes = '';
		$add_folder_message = '';
		$folder = '';
		$rename = '';
		$replace = '';

		if (!empty($_SESSION['user_id']))
	    {
		    if(add_file()){
		    	$add_file_succes = 'Fichier ajouté avec succés';
		    }
		    if(rename_file()){
		    	header('Location: ?action=profil');
		    }
		    
		    $my_files = my_files();
		    $formats = array();
		    foreach($my_files as $file){
		    	$formats[$file['file_name']] = file_extension($file['file_name']);
		    }

		    if(delete_file()){
		    	header('Location: ?action=profil');
		    }
		    $dir = "uploads/".$_SESSION['user_username'];
		    if(add_folder()){
		    	$folder = 'hahaha';
		    }
		    $allmydirectory = dirToArray($dir);

		    
		    	
		    //var_dump($add_folder());

		    if(replace_file()){
		    	header('Location: ?action=profil');
		    }

		    /*if(strlen($folders) == 0){
		    	$folder = 'hahaha';
		    }else{
		    	$folder = 'hihihi';
		    }*/
		   
		    require_once('views/profil.php');
	    }else{
	    	header('Location: ?action=login');
	        exit(0);
	    }  
	}
?>
<?php

	require_once('model/profil.php');
	function profil_action()
	{
	    $error = ''; 
	    if(add_file()){
	    	$error = 'clique sur submit';
	    }
	    require_once('views/profil.php');
	}

?>
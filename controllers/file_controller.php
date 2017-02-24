<?php
	require_once('model/file.php');

	function addfile_action()
	{
		$error = '';
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			if(get_file_by_id()){
				$error = 'Ta mère la pute';
			}
		}
		require('views/profil.php');
	}
?>
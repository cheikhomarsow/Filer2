<?php
	require_once('model/db.php');

	function get_file_by_id()
	{
	    return true;
	}

	function get_file_by_name($file_name, $id_user)
	{
	    $data = find_one_secure("SELECT * FROM files WHERE file_name = :file_name AND id_user = :id_user",
	                            [
	                            	'file_name' => $file_name,
	                             	'id_user' => $id_user
	                            ]);
	    return $data;
	}

?>
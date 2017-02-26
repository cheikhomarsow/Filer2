<?php

	require_once('model/db.php');
	function add_file(){
		$bool = false;
		if(isset($_POST['sumbit_add_file'])){
			if(isset($_FILES['file']['name']) && !empty($_FILES)){
				/*$file['file_name'] = $_FILES['file']['name'];
    			$file['password'] = user_hash($data['password']);
    			$user['firstname'] = $data['firstname'];
    			$user['lastname'] = $data['lastname'];
    			$user['secret_ask'] = $data['secret_ask'];
    			$user['secret_answer'] = $data['secret_answer'];

    			$file['file_name'] = $_FILES['file']['name'];
                //$file_extension = strrchr($file_name, '.');
                $file_tmp_name = $_FILES['file']['tmp_name'];
                $file_url = 'files/'.$username . "/" . $file_name;
   				db_insert('users', $user);
				$bool = true;*/
			}
		}
		return $bool;
	}



?>
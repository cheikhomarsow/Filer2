<?php

	require_once('model/db.php');
	
	function add_file(){
		$bool = false;
		if(isset($_POST['sumbit_add_file'])){
			if(isset($_FILES['file']['name']) && !empty($_FILES)){
			
    			$file['file_name'] = $_FILES['file']['name'];
                //$file_extension = strrchr($file_name, '.');
                $file_tmp_name = $_FILES['file']['tmp_name'];
                $file['url'] = 'uploads/'.$_SESSION['user_username'] . '/' . $file["file_name"];
 				$file['id_user'] = $_SESSION['user_id'];
 				$file['date'] = getDatetimeNow();

 				if(!file_exist($file['url'])){
 					db_insert('files', $file);
 					move_uploaded_file($file_tmp_name, $file['url']);
 					$bool = true;
 				}
			}
		}
		return $bool;
	}

	function get_file_by_file_url($file_url)
	{
		$id_user = $_SESSION['user_id'];
    	$data = find_one_secure("SELECT * FROM files WHERE file_url = :file_url AND 
    								id_user = :id_user",
                            ['file_url' => $file_url,
                             'id_user' => $id_user]);
    	return $data;
	}

	function file_exist($url){
		$data = get_file_by_file_url($url);
    	if ($data == false){
        	return false;
    	}
    	return true;
	}

	function getDatetimeNow() {
	    $tz_object = new DateTimeZone('Europe/Paris');
	    date_default_timezone_set('Europe/Paris');
	    $datetime = new DateTime();
	    $datetime->setTimezone($tz_object);
	    return $datetime->format('Y\-m\-d\ h:i:s');
	}



?>
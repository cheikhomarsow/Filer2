<?php

	require_once('model/db.php');
	
	function add_file(){
		$bool = false;
		if(isset($_POST['sumbit_add_file'])){
			if(isset($_FILES['file']['name']) && !empty($_FILES)){
			
    			$file['file_name'] = $_FILES['file']['name'];
                $file_tmp_name = $_FILES['file']['tmp_name'];
                $file['url'] = 'uploads/'.$_SESSION['user_username'] . '/' . $file["file_name"];
 				$file['id_user'] = $_SESSION['user_id'];
 				$file['date'] = getDatetimeNow();

 				if(extension_accept($file['file_name'])){
 					if(!file_exist($file['url'])){
	 					db_insert('files', $file);
	 					move_uploaded_file($file_tmp_name, $file['url']);
	 					$bool = true;
 					}
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

	function my_files(){
		$id_user = $_SESSION['user_id'];
 
		$data = find_all_secure("SELECT * FROM files WHERE id_user = :id_user ORDER BY DATE DESC",
                            ['id_user' => $id_user]);
		return $data;
	}

	function file_extension($file_name){
		return strrchr($file_name, '.');
	}

	function extension_accept($file_name){
		$extension_autorisees = array('.jpg', '.jpeg', '.txt','.png','.pdf');
		$format = file_extension($file_name);
		return in_array($format, $extension_autorisees);
	}

	function getDatetimeNow() {
	    $tz_object = new DateTimeZone('Europe/Paris');
	    date_default_timezone_set('Europe/Paris');
	    $datetime = new DateTime();
	    $datetime->setTimezone($tz_object);
	    return $datetime->format('Y\-m\-d\ h:i:s');
	}

	function delete_file(){
		$bool = false;
		if(isset($_POST['submit_delete_file'])){
			if($_POST['file_to_delete'] != ''){
				$id_user = $_SESSION['user_id'];
				$file_url = $_POST['file_to_delete'];
				if(!find_one_secure("DELETE FROM files WHERE file_url = :file_url AND id_user = :id_user",
                            ['file_url' => $file_url,
                             'id_user' => $id_user])){
					unlink($file_url);
					$bool = true;
				}
			}
		}
		return $bool;
	}

	function rename_file(){
		$bool = false;
		if(isset($_POST['submit_rename_file'])){
			if($_POST['current_file_name'] != '' && $_POST['file_to_rename'] != '' && $_POST['new_file_name'] != ''){
				$id_user = $_SESSION['user_id'];
				$current_file_name = $_POST['current_file_name'];
				$current_file_url = $_POST['file_to_rename'];

				$file_extension = file_extension($current_file_name);

				$file_name = $_POST['new_file_name'].$file_extension;
				$file_url = substr($current_file_url, 0, -(strlen($current_file_name))).$file_name;
				if(!file_exist($file_url)){
					if(!find_one_secure("UPDATE files SET file_name = :file_name , file_url = :file_url  WHERE id_user = :id_user AND file_url = :current_file_url",
                            ['file_name' => $file_name,
                             'file_url' => $file_url,
                             'current_file_url' => $current_file_url,
                             'id_user' => $id_user])){
						rename($current_file_url, $file_url);
						$bool = true;
					}
				}
				
			}
		}
		return $bool;
	}

	$folders = '';

	function add_folder(){
		$bool = false;
		if(isset($_POST['sumbit_add_folder'])){
			if(isset($_POST['new_folder_name']) AND $_POST['new_folder_name'] !== ''){
				$name_folder = $_POST['new_folder_name'];
				mkdir('uploads/'.$_SESSION['user_username'].'/'.$name_folder);
				$folders[] = $name_folder;
				$cpt++;
				$bool = true;
			}
		}
		return $bool;
	}

?>
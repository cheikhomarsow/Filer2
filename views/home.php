<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home page</title>
        <link rel="stylesheet" href="web/style/style.css">
    </head>
    <body>
    	<div id="container">
    	
        	<div id="containe_box">
        		<p>Hello <?php echo $username ?>, allez sur <a href='?action=profil'>'My files'</a> pour ajouter, supprimer ou modifier un fichier</p>
        	    <?php 
                    $cpt2 = 0;
                    echo "<div id='my_files'>";
                        foreach($all_files as $file){
                            if($formats[$file['file_name']]){
                                echo "<div class='files'>";
                                echo "<span><img src='web/img/user.png' alt='user'/>&nbsp;&nbsp;".$table_usernames[$cpt2]."</span>";
                                echo "<img class='img' src='".$file['file_url']."' alt='img'/>";
                                echo "<form action='?action=profil' method='POST'>
                                            <div class='file_name'>".$file['file_name']."</div>
                                            <div class='icons'>    
                                                <span><a href='".$file['file_url']."' download><img src='web/img/download.png' alt='download'/></a></span>
                                            </div>
                                            <input class='none' type='text' name='file_to_delete' value='".$file['file_url']."'>
                                            <input class='none' type='submit' name='submit_delete_file' id='".$file['file_url']."'>
                                        
                                            <input class = 'none' type='text' name='current_file_name' value='".$file['file_name']."'>
                                            <input class = 'none' type='text' name='file_to_rename' value='".$file['file_url']."'>
                                            <input class = 'rename_box' type='text' name='new_file_name' placeHolder='Nouveau nom du fichier'>
                                            <input class = 'rename_box' type='submit' name='submit_rename_file'>
                                        </form>";
                                echo "</div>";
                            }
                            $cpt2++;
                        }

                    ?>
                    
            </div>	
        </div>	
    </body>
</html>

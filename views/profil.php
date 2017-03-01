<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="web/style/style.css">
        <script src="web/script/script.js"></script>
    </head>
    <body>
      <div id="container">
        <?php require('header.php'); ?>
        <div id="containe_box">
             <div id="params">
                <div id="add_file_box">
                    <?php 
                        require_once('model/profil.php');
                        if(!empty($add_file_succes))
                            echo $add_file_succes.'<br>';
                        if(!empty($folder))
                            echo $folder.'<br>';

                    
                    ?>
                    <h5><img src='web/img/upload.png' alt='settings'/>&nbsp;&nbsp;Créer un dossier</h5>
                    <h5 id="add_file"><img src='web/img/upload.png' alt='settings'/>&nbsp;&nbsp;Ajouter un fichier</h5>
                    <div id='form_for_add_file'>
                        <p class='welcome'><b>Formats acceptés : </b>pdf, jpg, jpeg, png, txt</p>
                        <form action="?action=profil" method="POST" enctype="multipart/form-data">
                            <input type="file" name="file" >
                            <input type="submit" name="sumbit_add_file" value="Ajouter">
                        </form>
                    </div>    
                    <div id='form_for_add_folder'>
                        <form action="?action=profil" method="POST">
                            <input type="text" name="new_folder_name" placeHolder="Nom du dossier">
                            <input type="submit" name="sumbit_add_folder" value="Valider">
                        </form>
                    </div>  
                </div>
                <div id="other_params">
                    <h5 id="other_params_bis"><img src='web/img/settings.png' alt='settings'/>&nbsp;&nbsp;Autres paramètres</h5>    
                    <div id="other_params_box">
                        <h6><span id='rename_file'><img src='web/img/rename.png' alt='rename'/>&nbsp;&nbsp;Renommer un fichier:</span>
                            <span><img src='web/img/move.png' alt='move'/>&nbsp;&nbsp;Deplacer un fichier:</span></h6>
                    </div>
                </div>
            </div>
            <?php echo $_SESSION['user_username']; ?>
            <div id="my_files">
                <?php
                    foreach($my_files as $file){
                        if($formats[$file['file_name']]){
                            echo "<div class='files'>";
                            echo "<span><img src='web/img/user.png' alt='user'/>&nbsp;&nbsp;".$_SESSION['user_username']."</span>";
                            echo "<img class='img' src='".$file['file_url']."' alt='img'/>";
                            echo "<form action='?action=profil' method='POST'>
                                        <div class='file_name'>".$file['file_name']."</div>
                                        <div class='icons'>    
                                            <span><label for='".$file['file_url']."'><img src='web/img/delete.png' title='supprimer' alt='settings'/></label></span>
                                            <span><a href='".$file['file_url']."' download><img src='web/img/download.png' alt='download'/></a></span>
                                        </div>
                                        <input class='none' type='text' name='file_to_delete' value='".$file['file_url']."'>
                                        <input class='none' type='submit' name='submit_delete_file' id='".$file['file_url']."'>
                                    </form>
                                    <form action='?action=profil' method='POST'>
                                        <input class = 'none' type='text' name='current_file_name' value='".$file['file_name']."'>
                                        <input class = 'none' type='text' name='file_to_rename' value='".$file['file_url']."'>
                                        <input class = 'rename_box' type='text' name='new_file_name' placeHolder='Nouveau nom du fichier'>
                                        <input class = 'rename_box' type='submit' name='submit_rename_file'>
                                    </form>";
                            echo "</div>";
                        }
                    }
                ?>
            </div>
        </div>
      </div>
    </body>
</html>        
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
                            echo $add_file_succes;
                    ?>
                    <h5 id="add_file"><img src='web/img/upload.png' alt='settings'/>&nbsp;&nbsp;Ajouter un fichier</h5>
                    <div id='form_for_add_file'>
                        <p class='welcome'><b>Formats acceptés : </b>pdf, jpg, jpeg, png, txt</p>
                        <form action="?action=profil" method="POST" enctype="multipart/form-data">
                            <input type="file" name="file" >
                            <input type="submit" name="sumbit_add_file" value="Ajouter">
                        </form>
                    </div>    
                </div>
                <div id="other_params">
                    <h5><img src='web/img/settings.png' alt='settings'/>&nbsp;&nbsp;Autres paramètres</h5>    
                </div>
            </div>
            <div id="my_files">
                <?php
                    foreach($my_files as $file){
                        if($formats[$file['file_name']]){
                            echo "<div class='files'>";
                            echo "<span><img src='web/img/user.png' alt='user'/>&nbsp;&nbsp;".$_SESSION['user_username']."</span>";
                            echo "<img class='img' src='".$file['file_url']."' alt='img'/>";
                            echo "<form action='?action=profil' class='test' method='POST'>
                                        <div class='file_name'>".$file['file_name']."</div>
                                        <div class='icons'>    
                                            <span><label for='".$file['file_url']."'><img src='web/img/delete.png' title='supprimer' alt='settings'/></label></span>
                                            <span><a href='".$file['file_url']."' download><img src='web/img/download.png' alt='download'/></a></span>
                                        </div>
                                        <input class='none' type='text' value='".$file['file_url']."' placeHolder='nom du fichier à supprimer' name='file_to_delete'>
                                        <input class='none' type='submit' id='".$file['file_url']."' name='submit_delete_file' value='valider'>
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
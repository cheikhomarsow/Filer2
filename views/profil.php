<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="web/style/style.css">
    </head>
    <body>
      <div id="container">
        <?php require('header.php'); ?>
        <div id="containe_box">
             <div id="params">
                <div id="add_file">
                    <?php 
                        require_once('model/profil.php');
                        if(!empty($error))
                            echo $error;
                    ?>
                    <h5><img src='web/img/upload.png' alt='settings'/>&nbsp;&nbsp;Ajouter un fichier</h5>
                    <p class='welcome'><b>Formats acceptés : </b>pdf, jpg, jpeg, png, txt</p>
                    <form action="?action=profil" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file" >
                        <input type="submit" name="sumbit_add_file" value="Ajouter">
                    </form>
                </div>
                <div id="other_params">
                    <h5><img src='web/img/settings.png' alt='settings'/>&nbsp;&nbsp;Autres paramètres</h5>      
                </div>
            </div>
            <div id="my_files">
                <?php
                    foreach($my_files as $file){
                        if($formats[$file['file_name']] ){
                            echo "<div class='files'>";
                            echo "<span><img src='web/img/user.png' alt='user'/>&nbsp;&nbsp;".$_SESSION['user_username']."</span>";
                            echo "<img class='img' src='".$file['file_url']."' alt='img'/>";
                            echo "<span class='welcome'>".$file['file_name']."</span>";
                            echo "</div>";
                        }
                    }
                ?>
            </div>
        </div>
      </div>
    </body>
</html>        
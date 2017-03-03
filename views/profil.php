<!DOCTYPE html>
<?php chdir(); ?>
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
            <h5 id='add_file_or_folder'><span id='add_folder'><img src='web/img/folder.png' alt='settings'/>&nbsp;&nbsp;Créer un dossier</span><span id='add_file'><img src='web/img/upload.png' alt='settings'/>&nbsp;&nbsp;Ajouter un fichier</span></h5>
            <div id='form_for_add_file'>
                <p class='welcome'><b>Formats acceptés : </b>pdf, jpg, jpeg, png, txt</p>
                <form action="?action=profil" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file"><br>
                    <input type="text" name="nickname" placeHolder="nommer le fichier (Laisser vide sinon)">
                    <?php 
                        if(is_array($allmydirectory) && !empty($allmydirectory)){
                            echo "<select id='ask' name='directory'>";
                            echo "<option value='ajouter_dans_un_dossier'>Ajouter dans un dossier</option>";
                            foreach ($allmydirectory as $key => $value)
                            {
                                if(is_array($value)){
                                    echo "<option value='".$key."'>".$key."</option>";
                                }
                            }
                            echo "</select>";
                        }
                    ?>    
                    <label for='input_add_file_none'><img class='others_icons' src='web/img/upload2.png' ></label><input id='input_add_file_none' class='none' type="submit" name="sumbit_add_file" value="Ajouter">

                </form>
            </div>    
            <div class='none' id='form_for_add_folder'>
                <form action="?action=profil" method="POST">
                    <input type="text" name="new_folder_name" placeHolder="Nom du dossier">
                    <input type="submit" name="sumbit_add_folder" value="Créer dossier">
                </form>
            </div>  
        </div>
        <div id="other_params">
            <h5 id="other_params_bis"><img src='web/img/settings.png' alt='settings'/>&nbsp;&nbsp;Autres paramètres</h5>    
            <div id="other_params_box">
                <h6><span id='rename_file'><img src='web/img/rename.png' alt='rename'/>&nbsp;&nbsp;Renommer un fichier:</span>
                    <span><img src='web/img/move.png' alt='move'/>&nbsp;&nbsp;Deplacer un fichier:</span>
                    <span id='replace_file'><img src='web/img/replace.png' alt='move'/>&nbsp;&nbsp;Remplacer un fichier:</span></h6>
                </div>
                <div class='none' id='form_for_replace_file'>
                    <form action="?action=profil" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <input type="text" name="file_name_to_replace" placeHolder="nom du fichier a replacer">
                        <label for='input_replace_file_none'><img id='input_replace_file_none' class='others_icons' src='web/img/replace2.png' ></label><input type="submit" class='none' name="submit_replace_file" value="remplacer">
                    </form>
                </div>  
            </div>
        </div>
        <div id="my_files">
            <?php
            foreach($my_files as $file){
                if($formats[$file['file_name']]){
                    $none = 'dossier';
                    if(strlen($file['file_url'])>(strlen($_SESSION['user_username'])+9)){
                        $dossier = substr($file['file_url'], strlen($_SESSION['user_username'])+ 9,-(strlen($file['file_name'])+1)); 
                    }
                    if($dossier == '')
                        $none = 'none';
                    echo "<div class='files'>";
                    echo "<span><img src='web/img/user.png' alt='user'/>&nbsp;&nbsp;".$_SESSION['user_username']."</span>";
                    echo "<img class='img' src='".$file['file_url']."' alt='img'/>";
                    echo "<form action='?action=profil' method='POST'>
                    <div class='file_name'>".$file['file_name']."</div>
                    <div class='icons'>    
                        <span><label for='".$file['file_url']."'><img title='supprimer' src='web/img/delete.png' title='supprimer' alt='settings'/></label></span>
                        <span><a href='".$file['file_url']."' download><img src='web/img/download.png' alt='download'/></a></span>
                    </div>
                    <div class='".$none."'><img src='web/img/directory.png' alt='settings'/>&nbsp;&nbsp;".$dossier."</div>
                    <input class='none' type='text' name='file_to_delete' value='".$file['file_url']."'>
                    <input class='none' type='submit' name='submit_delete_file' id='".$file['file_url']."'>

                    <input class = 'none' type='text' name='current_file_name' value='".$file['file_name']."'>
                    <input class='none' type='text' name='file_to_rename' value='".$file['file_url']."'>
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="web/style.css">
    </head>
    <body>
      <div id="container">
        <?php require('header.php'); ?>
        <div id="containe_box">
            <?php 
                require_once('model/profil.php');

                if(!empty($error)){
                    echo $error;
                }else{
                    echo "vide";
                }
            ?>
             <div id="add_file">
                <h5><img src='img/file.png' alt='settings'/>&nbsp;&nbsp;Ajouter un fichier</h5>
                <p class='welcome'><b>Formats acceptés : </b>pdf, jpg, jpeg, png, txt</p>
                <form action="?action=profil" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file" >
                    <input type="submit" name="sumbit_add_file" value="Ajouter">
                </form>
            </div>
        </div>
      </div>
    </body>
</html>        
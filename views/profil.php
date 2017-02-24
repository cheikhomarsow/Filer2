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
            <?php if (!empty($error)): ?>
                <p>Error : <?php echo $error . "blabla"; ?></p>
            <?php endif; ?>
             <div id="add_file">
                <h5><img src='img/file.png' alt='settings'/>&nbsp;&nbsp;Ajouter un fichier</h5>
                <p class='welcome'><b>Formats acceptés : </b>pdf, jpg, jpeg, png, txt</p>
                <form action="?action=profil" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file" >
                    <input type="submit" name="sumbit" value="Ajouter">
                </form>
            </div>
        </div>
      </div>
    </body>
</html>        
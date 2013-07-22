<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 21:26
 * To change this template use File | Settings | File Templates.
 */?>
<!DOCTYPE html>
<html>
<head>
    <title>s'enscrire</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Inscription</h1>
<form action="" method="post">
    Nom d'utilisateur: <input type="text" name="username"><br>
    Mot de passe: <input type="password" name="pass"><br>
    Confirmation mot de passe: <input type="password" name="confirmPass"><br>
    Email: <input title="text" name="email"><br>
    Pourquoi voulez vous utiliser nos service ?:
    <br><textarea style="width: 300px;height: 100px;" name="raison"></textarea><br>
    <input type="submit" value="s'inscrire"><br>
</form>
<div style="border: 1px solid red; width: 300px;height: 20px;">
    <?php echo $return; ?>
</div>
</body>
</html>
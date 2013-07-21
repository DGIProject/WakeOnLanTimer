<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 09:16
 * To change this template use File | Settings | File Templates.
 */
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Connexion au service</title>
    </head>
<body>
    <center>
        <br><br>
        <div style="width: 500px; height: 150px; border: 1px solid #000000;">
            <form action="" method="post">
                Username: <input type="text" name="username"/>
                <br>Password: <input type="password" name="password"/>
                <br><input type="submit" value="connexion"/>
                <div style="border: 1px solid red;height: 30px;">
                    <?php echo $error ?>
                </div>
            </form>
        </div>
    </center>
</body>
</html>
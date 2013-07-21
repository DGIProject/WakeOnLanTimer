<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */

?>
<!DOCTYPE html>
    <html>
<head>
    <meta charset="utf-8">
    <title>Statu of my server</title>
</head>
<body>
<center>
    <div style="text-align: center;">
        <b>Name :</b><?php echo $server['name'] ?>
        <br><b>Ip or HostName: </b><?php echo $server['ip']?>
        <br><b>Etat: </b><?php echo getEtatServeur($server['ip']); ?>
    </div>
</center>
</body>
    </html>
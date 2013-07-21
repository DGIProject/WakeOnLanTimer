<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 20/07/13
 * Time: 17:11
 * To change this template use File | Settings | File Templates.
 */?>
<!DOCTYPE html>
<html>
<head>
    <title>Editer</title>
</head>
<body>
<form action="save/<?php echo $_GET['id'] ?>" method="post">
    Name : <input type="text" name="name" value="<?php echo $Ev['name'] ?>"/><br>
    Date d'expiration : <input type="text" value="<?php echo $Ev['dateExpire'] ?>" name="dataExpire"> ( format jj/mm/aaaa )<br>
    Lancer : Lundi<input type="checkbox" name="daysa[]" value="lundi" <?php echo isChecked('lundi',$dayList,'days'); ?>>
    Mardi<input type="checkbox" name="daysa[]" value="mardi" <?php echo isChecked('mardi',$dayList,'days'); ?>>
    Mercrdi<input type="checkbox" name="daysa[]" value="mercredi" <?php echo isChecked('mercredi',$dayList,'days'); ?>>
    Jeudi<input type="checkbox" name="daysa[]" value="jeudi" <?php echo isChecked('jeudi',$dayList,'days'); ?>>
    Vendredi<input type="checkbox" name="daysa[]" value="vendredi" <?php echo isChecked('vendrdi',$dayList,'days'); ?>>
    Samedi<input type="checkbox" name="daysa[]" value="samedi" <?php echo isChecked('samedi',$dayList,'days'); ?>>
    Dimanche<input type="checkbox" name="daysa[]" value="dimanche" <?php echo isChecked('dimanche',$dayList,'days'); ?>><br>
    Des mois :
    janvier<input type="checkbox" name="month[]" value="janvier" <?php echo isChecked('janvier',$monthListe,'month'); ?>>
    fevrier<input type="checkbox" name="month[]" value="fevrier" <?php echo isChecked('fevrier',$monthListe,'month'); ?>>
    mars<input type="checkbox" name="month[]" value="mars" <?php echo isChecked('mars',$monthListe,'month'); ?>>
    avril<input type="checkbox" name="month[]" value="avril" <?php echo isChecked('avril',$monthListe,'month'); ?>>
    mai<input type="checkbox" name="month[]" value="mai" <?php echo isChecked('mai',$monthListe,'month'); ?>>
    juin<input type="checkbox" name="month[]" value="juin" <?php echo isChecked('juin',$monthListe,'month'); ?>>
    juillet<input type="checkbox" name="month[]" value="juillet" <?php echo isChecked('juillet',$monthListe,'month'); ?>>
    aout<input type="checkbox" name="month[]" value="aout" <?php echo isChecked('aout',$monthListe,'month'); ?>>
    septembre<input type="checkbox" name="month[]" value="septembre" <?php echo isChecked('septembre',$monthListe,'month'); ?>>
    octobre<input type="checkbox" name="month[]" value="octobre" <?php echo isChecked('octobre',$monthListe,'month'); ?>>
    novembre<input type="checkbox" name="month[]" value="novembre" <?php echo isChecked('novembre',$monthListe,'month'); ?>>
    decembre<input type="checkbox" name="month[]"  value="decembre" <?php echo isChecked('decembre',$monthListe,'month'); ?>><br>
    a l'heure suivante : <input type="text" name="clock" value="<?php  echo $timeExec?>"> ( format hh:mm )<br>
    Allumer le serveur ayant pour ip : <input type="text" value="<?php echo $Ev['ip'] ?>" name="ip">
    sur le port <input type="text" value="<?php echo $Ev['port'] ?>" name="port"/> avec l'adresse mac
    <input type="text" name="mac" value="<?php echo $Ev['mac'] ?>"/><br>
    <?php
    if ($expired != 'Expired')
    {
        echo '<input type="submit" value="Mettre a jour">';
    }
    ?>
</form>
</body>
</html>
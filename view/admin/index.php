<?php
// intresting things http://trentrichardson.com/examples/timepicker/
// and Jquery datePicker.
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<title>Ajouter un evenement</title>
</head>
<body>
Voici la liste de vos tache deja planifier vous pouvez en suprimer une ou bien en editer une.
<table>
    <thead>
    <tr>
        <td>Name</td><td>date</td><td>State</td><td>action</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($listEv as $Ev)
    {
        echo '<tr>';
        echo '<td>'.$Ev['name'].'</td><td>'.$Ev['createdOn'].'</td><td>'.getState($Ev['dateExpire']).'</td><td><a href="account/edit/'.$Ev['id'].'">Editer</a> <a href="account/delete/'.$Ev['id'].'">Supprimer</a></td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
<br>
<br>
<br>
Avec le formulaire suivant vous pourrez ajouter un reveille répété de votre ordinateur et ce sans auccune action de votre part.
<form action="addEv" method="post">
    <br>
    Name : <input type="text" name="name"/><br>
    Date d'expiration : <input type="text" name="dataExpire"> ( format jj/mm/aaaa )<br>
    Lancer : Lundi<input type="checkbox" name="daysa[]" value="lundi">
    Mardi<input type="checkbox" name="daysa[]" value="mardi">
    Mercrdi<input type="checkbox" name="daysa[]" value="mercredi">
    Jeudi<input type="checkbox" name="daysa[]" value="jeudi">
    Vendredi<input type="checkbox" name="daysa[]" value="vendredi">
    Samedi<input type="checkbox" name="daysa[]" value="samedi">
    Dimanche<input type="checkbox" name="daysa[]" value="dimanche"><br>
    Des mois :
    janvier<input type="checkbox" name="month[]" value="janvier">
    fevrier<input type="checkbox" name="month[]" value="fevrier">
    mars<input type="checkbox" name="month[]" value="mars">
    avril<input type="checkbox" name="month[]" value="avril">
    mai<input type="checkbox" name="month[]" value="mai">
    juin<input type="checkbox" name="month[]" value="juin">
    juillet<input type="checkbox" name="month[]" value="juillet">
    aout<input type="checkbox" name="month[]" value="aout">
    septembre<input type="checkbox" name="month[]" value="septembre">
    octobre<input type="checkbox" name="month[]" value="octobre">
    novembre<input type="checkbox" name="month[]" value="novembre">
    decembre<input type="checkbox" name="month[]" value="decembre"><br>
    a l'heure suivante : <input type="text" name="clock"> ( format hh:mm )<br>
    Allumer le serveur ayant pour ip : <input type="text" name="ip"> sur le port <input type="text" name="port"/> avec l'adresse mac
    <input type="text" name="mac"/>
    <br>
    <input type="submit" value="Ajouter"/>
</form>
<a href="logout">Deconexion</a>
</body>
</html>
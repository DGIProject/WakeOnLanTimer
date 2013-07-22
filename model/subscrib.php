<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 21:26
 * To change this template use File | Settings | File Templates.
 */
function addUser($user,$pass,$raison,$email,$id)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO users(username,pass,email,raison,uniqId,valid) VALUE(:user,:pass,:email,:raison,:uniqId,:valid)');
    $req->execute(array('user'=>$user,'pass'=>sha1($pass),'email'=>$email,'raison'=>nl2br($raison),'uniqId'=> $id,'valid'=>0));
}
function sendMailToUser($email,$user,$pass,$id)
{
    $headers ='From: pox.alwaysdata.com'."\n";
    $headers .='Reply-To: pox@alwaysdata.com'."\n";
    $headers .='Content-Type: text/html; charset="UTF-8"'."\n";
    $headers .='Content-Transfer-Encoding: 8bit';

    $message ='<html>
    <head>
    <title>Un titre ici</title>
    </head>
    <body>
    <h1>Nous vous souhaitons la bienvenue !</h1><br>
    <p>
    Le présent mail que vous recevez est un mail de confirmation de votre inscription sur le service WakeOnLanTimer.<br>
    Ce service vous permet d\'allumer vos serveur ou ordinateur grace au WakeOnLan, a distance.<br>
    Voici les identifiant que vous avez entré:<br>
    <b>Identifiant: </b>'.$user.'<br>
    <b>Mot de passe: </b>'.$pass.'<br>
    <br>
    Pour valider votre compte <a href="http://pox.alwaysdata.net/other/tutorials/MServer/validate/'.$email.'/'.$id.'">cliquez-ici</a>
    </p>
    <div style="font-size: 10px;">
    Si ce n\'est pas vous qui avez créé le compte sur notre site: <a href="http://pox.alwaysdata.net/other/tutorials/MServer/deactivate/'.$email.'/'.$id.'">cliquez-ici</a> afin de le désactiver.
    </div>
    </body>
    </html>';

    if(mail($email, 'Confirmation d\'inscription ', $message, $headers))
    {
        return "ok";
    }
    else
    {
        return "not";
    }
}
function existUser($user)
{
    global $bdd;
    $req = $bdd->prepare('SELECT COUNT(*) as exist FROM users WHERE username=?');
    $req->execute(array($user));
    $rep = $req->fetch();
    if ($rep['exist'] == 0)
    {
        return false;
    }
    else
    {
        return true;
    }
}
function existEmail($email)
{
    global $bdd;
    $req = $bdd->prepare('SELECT COUNT(*) as exist FROM users WHERE email=?');
    $req->execute(array($email));
    $rep = $req->fetch();
    if ($rep['exist'] == 0)
    {
        return false;
    }
    else
    {
        return true;
    }
}
function deleteUser($email,$id)
{
    global $bdd;
    $req= $bdd->prepare('DELETE FROM users WHERE email=? AND uniqId=?');
    $req->execute(array($email,$id));
}
function activateUser($email,$id)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE users SET valid=1 WHERE email=? AND uniqId=?');
    $req->execute(array($email,$id));
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 09:31
 * To change this template use File | Settings | File Templates.
 */
function userConnect($user,$pass)
{

    global $bdd;
    $req = $bdd->prepare('SELECT COUNT(*) as exist FROM users WHERE username=:username AND pass=:pass');
    $req->execute(array('username' => $user,'pass'=>sha1($pass)));
    $rep = $req->fetch();
    if ($rep['exist'] != 0)
    {
        $_SESSION['wolUser'] = $user;
        header('Location: account');
    }
    else
    {
        return "Identifiant ou mot de passe incorrecte";
    }
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 08:59
 * To change this template use File | Settings | File Templates.
 */
define('NOERROR','00000');

function deleteEvById($id)
{
    global $bdd;
    $req= $bdd->prepare('DELETE FROM jobs WHERE id=?');
    $req->execute(array($id));
    return $req->errorInfo();
}
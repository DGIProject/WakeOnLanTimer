<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */
function getServer($id)
{
    global $bdd;
    $req = $bdd->prepare('SELECT name,ip,id FROM jobs WHERE id=?');
    $req->execute(array($id));
    return $req->fetch();
}
function getEtatServeur($ip)
{

    $lne = 'http://82.236.9.212:80';
    $handle = @fopen($lne, "r");

    if ($handle === false)

        return 'not';

    fclose($handle);

    return 'ok';

}
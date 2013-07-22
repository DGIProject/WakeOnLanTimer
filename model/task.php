<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 20/07/13
 * Time: 13:48
 * To change this template use File | Settings | File Templates.
 */
function getTache($id,$user)
{
    global $bdd;
    $req=$bdd->prepare('SELECT * FROM jobs WHERE user=? AND id=?');
    $req->execute(array($user,$id));
    $rep = $req->fetch();
    return $req->fetch();
}
function deactive($id)
{
	global $bdd;
	$req= $bdd->prepare('UPDATE jobs SET active=0 WHERE id=?');
	$req->execute(array($id));
}

function getState($date)
{
    $timeTotest = strtotime(convertToEnglishTime($date));
    $actual = time();
    if ($timeTotest > $actual)
    {
        return false;
    }
    else
    {
        return true;
    }
}
function convertToEnglishTime($mydate){
    $ArraydateValue = explode('/',$mydate);
    return $ArraydateValue[1].'/'.$ArraydateValue[0].'/'.$ArraydateValue[2];
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 08:53
 * To change this template use File | Settings | File Templates.
 */
function getAllEntryForUser($user)
{
    global $bdd;
    $req = $bdd->prepare('SELECT * FROM jobs WHERE user=?');
    $req->execute(array($user));
    return $req->fetchAll();
}
function getState($date)
{
    $timeTotest = strtotime(convertToEnglishTime($date));
    $actual = time();
    if ($timeTotest > $actual)
    {
        return 'In life';
    }
    else
    {
        return 'Expired';
    }
}
function convertToEnglishTime($mydate){
    $ArraydateValue = explode('/',$mydate);
    return $ArraydateValue[1].'/'.$ArraydateValue[0].'/'.$ArraydateValue[2];
}
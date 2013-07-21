<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 19/07/13
 * Time: 22:17
 * To change this template use File | Settings | File Templates.
 */

function addEvenement($user,$name,$mac, $ip, $port,$dateExpire,$configLine)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO jobs(user,name,mac,ip,port,dateExpire,configs) VALUE(:user,:name,:mac,:ip,:port,:date,:config)');
    $req->execute(array('user'=> $user, 'name'=>$name,'mac'=>$mac,'ip'=>$ip,'port'=> $port,'date'=> $dateExpire,'config' => $configLine));
    return $bdd->lastInsertId();

}
function addEvenementToFile($configLine)
{
    if( !($fp = fopen('../../data/cron.ccron', 'a')) ) return -1;
    fprintf( $fp, $configLine );

}
function addToCron()
{

}
$daysTab = array(
    'lundi' => 1,
    'mardi' => 2,
    'mercredi' => 3,
    'jeudi' => 4,
    'vendredi' => 5,
    'samedi' => 6,
    'dimanche' => 0
);
$monthTab = array(
    'janvier' => 1,
    'fevrier' => 2,
    'mars' => 3,
    'avril' => 4,
    'mai' => 5,
    'juin'=> 6,
    'juillet' => 7,
    'aout' => 8,
    'septembre' => 9,
    'octobre' => 10,
    'novembre' => 11,
    'decembre' => 12
);
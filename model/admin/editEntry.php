<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 20/07/13
 * Time: 17:11
 * To change this template use File | Settings | File Templates.
 */

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
function getEvById($id)
{
    global $bdd;
    $req = $bdd->prepare('SELECT * FROM jobs WHERE id=?');
    $req->execute(array($id));
    return $req->fetch();
}
function isChecked($nameTag,$arrayList,$type)
{
 global $daysTabInverse, $monthTabInverse;
    if ($type == "days")
    {
        foreach ($arrayList as $elem)
        {
            if ($nameTag == $daysTabInverse[$elem]){return "checked";}
        }
    }
    elseif ($type =="month"){
        foreach ($arrayList as $elem)
        {
            if ($nameTag == $monthTabInverse[$elem]){return "checked";}
        }
    }
}
function updateEv($user,$name,$mac, $ip, $port,$dateExpire,$configLine,$id)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE jobs SET user=:user,name=:name,mac=:mac,ip=:ip,port=:port,dateExpire=:date,configs=:config where id=:id');
    $req->execute(array('user'=> $user, 'name'=>$name,'mac'=>$mac,'ip'=>$ip,'port'=> $port,'date'=> $dateExpire,'config' => $configLine, 'id'=>$id));
    return $req->errorCode();
}
$daysTabInverse = array(
    1 => 'lundi' ,
    2=>'mardi',
    3=>'mercredi',
    4=>'jeudi' ,
    5=>'vendredi',
    6=>'samedi' ,
    0=>'dimanche'
);
$monthTabInverse = array(
    1=>'janvier',
    2=>'fevrier' ,
    3=>'mars' ,
    4=>'avril',
    5=>'mai' ,
    6=>'juin',
    7=>'juillet',
    8=>'aout',
    9=>'septembre',
    10=>'octobre' ,
    11=>'novembre',
    12=>'decembre'
);
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
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 22/07/13
 * Time: 10:37
 * To change this template use File | Settings | File Templates.
 */

try
{
    $bdd = new PDO('mysql:host=mysql2.alwaysdata.com;dbname=loquii_wol' , 'loquii_wol' , 'wol');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


function updateCronTab()
{
    $executionRepertory = $_SERVER['PHP_SELF'];
    $path = substr($executionRepertory,0,strlen($executionRepertory)-22);
    echo $path;
    $filePath = $path.'data/cron.ccron';
    echo $filePath;
    if( !($cronFile = fopen($filePath, 'w')) ) return -1;
    fclose($cronFile);
    if( !($cronFile = fopen($filePath, 'a')) ) return -1;



    $jobs = getAllCronLineFromBdd();
    fprintf( $cronFile,"*/5 * * * * crontab ".$path."data/cron.ccron \n");
    fprintf($cronFile, "*/4 * * * * php /home/pox/www/other/tutorials/MServer/controler/makeCron.php \n");
    foreach ($jobs as $job)
    {
        $ligne = $job['configs'].' php5 '.$path.' '.$job['user'].' '.$job['id']."\n";
        fprintf( $cronFile,$ligne);
    }
    fclose($cronFile);
}
function getAllCronLineFromBdd()
{
    global $bdd;
    $req = $bdd->prepare('SELECT configs,user,id FROM jobs');
    $req->execute();
    return $req->fetchAll();
}

updateCronTab();
exit();
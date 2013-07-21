<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 18:40
 * To change this template use File | Settings | File Templates.
 */

function updateCronTab()
{
    if( !($cronFile = fopen('../../data/cron.ccron', 'w')) ) return -1;
    fclose($cronFile);
    if( !($cronFile = fopen('../../data/cron.ccron', 'a')) ) return -1;


    $jobs = getAllCronLineFromBdd();
    foreach ($jobs as $job)
    {
        $ligne = $job['configs'].' php5 www/other/MServer/task.php '.$job['user'].' '.$job['id']."\n";
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

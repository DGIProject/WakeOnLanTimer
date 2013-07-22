<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 20/07/13
 * Time: 13:47
 * To change this template use File | Settings | File Templates.
 */
include "model/sql_connector.php";
include "model/task.php";
include "model/wake.class.php";

if ($_GET['u'] != null AND $_GET['id'] != null)
{
    // from a webbrowser ...
    echo 'ok';
}
else{
    if ($argv[1] !=null AND $argv[2] != null)
    {
        //From commande pront or from cron
        echo $argv[1];
        echo $argv[2];
        $user = $argv[1];
        $id = $argv[2];
        $job = getTache($id,$user);
        
        if (getState($job['dateExpire'])) {
            echo 'expire ';
        print_r(deactive($id));
        	exit();
        }
        else {
        	
				$wol = new Wol();
 				$wol->wake($job['mac'],$job['ip'], $job['port']);
        }
        mail('guiguivil@gmail.com','lunched','justeLunched');
    }
    else
    {
        echo 'Erreur Fatale ! Elements Manquant.';
        exit(1);
    }

}
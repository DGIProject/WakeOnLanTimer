<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 20/07/13
 * Time: 17:11
 * To change this template use File | Settings | File Templates.
 */
define('NOERROR','00000');
include '../../model/sql_connector.php';
include '../../model/admin/editEntry.php';
include '../../model/makeCron.php';

if($_GET['id'] != null)
{
    if ($_GET['type'] == 'save')
    {
        $montsList = "";
        $daysList = "";
        $first = true;
        foreach ($_POST['month'] as $month)
        {

            if ($first)
            {
                $first=false;
                $montsList .= $monthTab[$month];

            }
            else
            {
                $montsList .= ','.$monthTab[$month];

            }
        }
        $first =true;
        foreach ($_POST['daysa'] as $day)
        {

            if ($first)
            {
                $first=false;
                $daysList .= $daysTab[$day];
            }
            else
            {
                $daysList .= ','.$daysTab[$day];
            }

        }
        $minutes = 0;
        $hours =0;
        $clock = explode(':',$_POST['clock']);
        $minutes = $clock[1];
        $hours = $clock[0];
        $configLine = $minutes.' '.$hours.' * '.$montsList.' '.$daysList;
       $ErrorCode = updateEv($_SESSION['wolUser'],$_POST['name'],$_POST['mac'], $_POST['ip'], $_POST['port'],$_POST['dataExpire'],$configLine,$_GET['id']);
        if ($ErrorCode == NOERROR)
        {

           header('Location: ../../../account');
        }
        else
        {
            echo "Une erreur est survenue !";
        }
        exit(0);
    }
    //edit specific info
    $Ev = getEvById($_GET['id']);
    $AllValues = explode(' ',$Ev['configs']);
    $timeExec = $AllValues[1].':'.$AllValues[0];
    $monthListe = explode(',',$AllValues[3]);
    $dayList = explode(',',$AllValues[4]);
    $expired = getState($Ev['dateExpire']);
    updateCronTab();
    include '../../view/admin/editEntry.php';

}

<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 19/07/13
 * Time: 22:16
 * To change this template use File | Settings | File Templates.
 */
include "../../model/sql_connector.php";
include "../../model/admin/addEv.php";

if ($_SESSION['wolUser'] != null)
{
    $montsList = "";
    $daysList = "";
    $first = true;
    echo 'logged';
    print_r($_POST);
    foreach ($_POST['month'] as $month)
    {
        echo '<br>'.$month;
        if ($first)
        {
            $first=false;
            $montsList .= $monthTab[$month];
            echo $montsList;
        }
        else
        {
            $montsList .= ','.$monthTab[$month];
            echo $montsList;
        }
    }
    $first =true;
    foreach ($_POST['daysa'] as $day)
    {
        echo '<br>'.$day;
        if ($first)
        {
            $first=false;
            $daysList .= $daysTab[$day];
            echo $daysList;
        }
        else
        {
            $daysList .= ','.$daysTab[$day];
            echo $daysList;
        }

    }
    $minutes = 0;
    $hours =0;
    $clock = explode(':',$_POST['clock']);
    $minutes = $clock[1];
    $hours = $clock[0];
    echo '<br><br> monthLIste :'.$montsList;
    echo '<br><br> DayLIst :'.$daysList;
    echo '<br><br> Hour :'.$hours.' mintes :'.$minutes;
    $configLine = $minutes.' '.$hours.' * '.$montsList.' '.$daysList;
    $returned_ID= addEvenement($_SESSION['wolUser'],$_POST['name'],$_POST['mac'], $_POST['ip'], $_POST['port'],$_POST['dataExpire'],$configLine);
    $ligneToAdd = $minutes.' '.$hours.' * '.$montsList.' '.$daysList.' php5 www/other/MServer/task.php '.$_SESSION['wolUser'].' '.$returned_ID;
    echo '<br><br>'.$ligneToAdd;
    addEvenementToFile($ligneToAdd);
    header('Location: account');
}
else
{
    header('Location: login');
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 08:58
 * To change this template use File | Settings | File Templates.
 */
include "../../model/sql_connector.php";
include "../../model/admin/delEv.php";
include "../../model/makeCron.php";

if ($_GET['id'] != null && is_numeric($_GET['id']))
{
    $errorCode = deleteEvById($_GET['id']);
    if ($errorCode[0] == NOERROR)
    {
        echo 'L\'evenement est bien supprimé';
        updateCronTab();
        header('Location: ../../account');
    }
    else
    {
        echo 'Une erreur est survenue!';
        print_r($errorCode);
    }
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */
include "../../model/sql_connector.php";
include "../../model/admin/serverStatu.php";
 if( $_SESSION['wolUser'] == null)
 {
     header('Location: login');
     exit();
 }

if (!is_numeric($_GET['id']))
{
    header('Location error.html');
}
$server = getServer($_GET['id']);

include "../../view/admin/serverStatu.php";
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 19/07/13
 * Time: 21:50
 * To change this template use File | Settings | File Templates.
 */
include "../../model/sql_connector.php";
include "../../model/admin/index.php";

if ($_SESSION['wolUser'] != null)
{
    $listEv = getAllEntryForUser($_SESSION['wolUser']);
    include "../../view/admin/index.php";
}
else
{
    header('Location: login');
}




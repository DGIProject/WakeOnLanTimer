<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 09:15
 * To change this template use File | Settings | File Templates.
 */
include "../model/sql_connector.php";
include "../model/login.php";

if ($_SESSION['wolUser'] != null){ header('Location: account');}

if (isset($_POST['username']))
{
    $error = userConnect($_POST['username'],$_POST['password']);
}

include "../view/login.php";

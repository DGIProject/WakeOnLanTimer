<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 19/07/13
 * Time: 21:44
 * To change this template use File | Settings | File Templates.
 */

session_start();

try
{
    $bdd = new PDO('mysql:host=mysql2.alwaysdata.com;dbname=loquii_wol' , 'loquii_wol' , 'wol');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

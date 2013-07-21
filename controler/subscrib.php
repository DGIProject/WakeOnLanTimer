<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 21:26
 * To change this template use File | Settings | File Templates.
 */
include "../model/subscrib.php";

if (isset($_POST['usename']))
{
    if(!existUser($_POST['email'],$_POST['username']))
    {

    }
}


include "../view/subscrib.php";
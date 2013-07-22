<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 21/07/13
 * Time: 21:26
 * To change this template use File | Settings | File Templates.
 */
include "../model/sql_connector.php";
include "../model/subscrib.php";

if ($_GET['a'] == 'deactivate' AND $_GET['email'] != null)
{
    deleteUser($_GET['email'], $_GET['id']);
    header('Location: ../...');
}
elseif ($_GET['a'] == 'activate' AND $_GET['email'] != null)
{
    activateUser($_GET['email'], $_GET['id']);
    header('Location: ../..');
}

if (isset($_POST['username']))
{

    if(!existUser($_POST['username']))
    {
        if ($_POST['pass'] == $_POST['confirmPass'])
        {
            $Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
            if (preg_match($Syntaxe,$_POST['email']))
            {
                if(!existEmail($_POST['email']))
                {
                  $id = uniqid();
                  addUser($_POST['username'],$_POST['pass'],$_POST['raison'], $_POST['email'],$id);
                  sendMailToUser($_POST['email'],$_POST['username'],$_POST['pass'],$id);
                }
                else
                {
                    $return = 'Email deja utilisé';
                }
            }
            else{
                $return = 'Email non valide';
            }
        }
        else
        {
            $return = 'Mot de passe non identique';
        }
    }
    else{
        $return = 'Ce nom d\'utilisateur est deja utilisé';
    }
}


include "../view/subscrib.php";
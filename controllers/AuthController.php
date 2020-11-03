<?php
/**
 * Created by PhpStorm.
 * User: schok
 * Date: 02.11.2020
 * Time: 19:21
 */


function loginAction($smarty){

    $smarty->assign('pageTitle', '  | Auth .team php');
    $smarty->assign('pageDesc', 'Auth  | Amen.team php');

    if(isset($_SESSION['admin-login']) && $_SESSION['admin-login'] == true) redirectTo('/admin/');

    if(isset($_POST['loginBtn'])){
        $errorMessage = [];

        if($_POST['login'] != 'admin'){
            $errorMessage[] = 'Не верный логин';
        }

        if($_POST['password'] != '123'){
            $errorMessage[] = 'Не верный пароль';
        }

        if(empty($errorMessage)){
            $_SESSION['admin-login'] = true;
            redirectTo('/admin/');
        }else{
            $smarty->assign('errorMessage', $errorMessage);
            $smarty->assign('post', $_POST);
        }
    }

    loadTemplate($smarty, 'templates/mainAuthTemplate', 'auth.tpl');
}

function outAction(){
   unset($_SESSION['admin-login']);
   redirectTo('/auth/login/');
}
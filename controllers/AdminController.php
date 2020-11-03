<?php
use App\models\Reviews;

/**
 * Created by PhpStorm.
 * User: schok
 * Date: 02.11.2020
 * Time: 19:18
 */


 function indexAction($smarty){
     $smarty->assign('pageTitle', 'Admin | Amen.team php');
     $smarty->assign('pageDesc', 'Admin | Amen.team php');

     if(!$_SESSION['admin-login']){
         redirectTo('/auth/');
     }

     $reviews = Reviews::getWidthSortForAdmin();
     $smarty->assign('reviews', $reviews);

     loadTemplate($smarty, 'templates/mainAuthTemplate', 'admin.tpl');
 }
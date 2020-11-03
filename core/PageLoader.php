<?php

namespace App\core;
use Smarty;

/**
 * Created by PhpStorm.
 * User: schok
 * Date: 31.10.2020
 * Time: 17:11
 */
class PageLoader
{
    public $smarty;
    public $controllerName;
    public $actionName;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(TEMPLATE_PREFIX);
        $this->smarty->setCompileDir( __DIR__ . "/../tmp/smarty/templates_c");
        $this->smarty->setCacheDir( __DIR__ . "/../tmp/smarty/cache");
        $this->smarty->setConfigDir( __DIR__ . "/../vendor/smarty/smarty/configs");

        $this->controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'Inndex';
        $this->actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

        $this->smarty->assign('time', time());

    }

    public function loadTemplate($templateName)
    {
        $this->smarty->display( $templateName . ".tpl");
    }

    public function loadController()
    {
        //Проверка сушествует ли фаил
        if(!file_exists(PATH_PREFIX . $this->controllerName . PATH_POSTFIX)){
            $this->loadPage404();
            exit;
        }

        include_once PATH_PREFIX. $this->controllerName .PATH_POSTFIX;

        //Избавляемся от -
        $action = str_replace('-', "", $this->actionName);

        //Проверка сушествует ли функция
        if(!function_exists($action . 'Action')){
            $this->loadPage404();
        }else{
            $function = $action . 'Action';
            $function($this->smarty);
        }


    }

    public function loadPage404()
    {
        http_response_code (404);
        $this->smarty->assign('pageTitle', '404 Page not found');
        $this->smarty->assign('pageDesc', '404 Page not found');
        $this->smarty->assign('tamplate', '404.tpl');
        $this->loadTemplate('templates/mainAuthTemplate');
    }
}
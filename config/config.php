<?php
define ('ADMIN_PASS', '123');

//Используемый шаблон
$template = 'default/';
$templateAdmin = 'admin';

//Пути к файлам шаблонов (*.tpl)
define ('TEMPLATE_PREFIX'       , __DIR__ . "/../views/{$template}/");
define ('TEMPLATE_ADMIN_PREFIX', __DIR__ . "/../views/{$templateAdmin}/");

//Константы для обращения к контроллерам
define('PATH_PREFIX', __DIR__ . '/../controllers/');
define('PATH_POSTFIX', 'Controller.php');

<?php
function smartyInit(){
  //Инициализация шаблона Смарти

  require __DIR__ . '/../vendor/smarty/smarty/libs/Smarty.class.php';
  $smarty = new Smarty();

  //$smarty->debugging = true;
  //$smarty->caching = true;
  //$smarty->cache_lifetime = 120;

  $smarty->setTemplateDir(TEMPLATE_PREFIX);
  $smarty->setCompileDir( __DIR__ . "/../tmp/smarty/templates_c");
  $smarty->setCacheDir( __DIR__ . "/../tmp/smarty/cache");
  $smarty->setConfigDir( __DIR__ . "/../vendor/smarty/smarty/configs");

  $smarty->assign('domen', DOMEN);
  $smarty->assign('time', time());

  return $smarty;
}

function loadTemplate($smarty, $templateName){
	$smarty->display($templateName . ".tpl");
}

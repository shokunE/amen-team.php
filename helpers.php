<?php

function xprint( $param, $title = 'Отладочная информация' )
{
  ini_set( 'xdebug.var_display_max_depth', 50 );
  ini_set( 'xdebug.var_display_max_children', 25600 );
  ini_set( 'xdebug.var_display_max_data', 9999999999 );
  if ( PHP_SAPI == 'cli' )
  {
    echo "\n---------------[ $title ]---------------\n";
    echo print_r( $param, true );
    echo "\n-------------------------------------------\n";
  }
  else
  {
    ?>
    <style>
    .xprint-wrapper {
      padding: 10px;
      margin-bottom: 25px;
      color: black;
      background: #f6f6f6;
      position: relative;
      top: 18px;
      border: 1px solid gray;
      font-size: 11px;
      font-family: InputMono, Monospace;
      width: 80%;
    }
    .xprint-title {
      padding-top: 1px;
      color: #000;
      background: #ddd;
      position: relative;
      top: -18px;
      width: 170px;
      height: 15px;
      text-align: center;
      border: 1px solid gray;
      font-family: InputMono, Monospace;
    }
    </style>
    <div class="xprint-wrapper">
      <div class="xprint-title"><?= $title ?></div>
      <pre style="color:#000;"><?= htmlspecialchars( print_r( $param, true ) ) ?></pre>
    </div><?php
  }
}

function d( $val, $title = 'Отладочная информация' )
{
  xprint( $val, $title );
  die();
}

function redirectTo($url){
  header('Location: '.$url);
  exit;
}

function getParamPage(){
	$getParamPage = explode( "?", urldecode($_SERVER['REQUEST_URI']));
	$getParamPage = explode( "&", $getParamPage[1]);
	foreach ($getParamPage as $val) {
		$getVal = explode("=",$val);
		$_GET[$getVal[0]] =  $getVal[1];
	}
	return $_GET;
}


function protectPostData($post){
  foreach ($post as $key => $value) {
    $post[$key] = htmlspecialchars($value);
  }
  return $post;
}


function get404Page( $smarty ){
    http_response_code (404);
    $smarty->assign('pageTitle', '404 Page not found'.DOMEN_TITLE);
    $smarty->assign('pageDesc', '404 Page not found');
    $smarty->assign('tamplate', 'all/404.tpl');
    if(!isset($_SESSION['user'])){
        loadTemplate($smarty, 'templates/mainTemplate');
    }else{
        loadTemplate($smarty, 'templates/mainAuthTemplate');
    }
    exit;
}

function loadTemplate($smarty, $templateName, $content){
    $smarty->assign('tamplate', $content);
    $smarty->display( TEMPLATE_PREFIX . $templateName . '.tpl');
}

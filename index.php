<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/src/Bramus/Router/Router.php';
require  __DIR__ . '/src/Smarty/Smarty.class.php';
require  __DIR__ . '/src/Controllers/Public/Main.class.php';

$tpl = new Smarty;
$router = new \Bramus\Router\Router();



$router->all('/', 'Main@index');

$template = explode("@",$router->afterRoutes["GET"][0]["fn"]);
$router->run(function() use ($tpl) {
    $tpl->setTemplateDir(__DIR__."/templates/v1/");
    $tpl->display($GLOBALS["template"][1].".tpl");
});



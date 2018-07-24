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


$template = explode("@",$router->fn);
$router->run(function() use ($tpl) {
    $showInNav = array(
        "/" => "HOME",
    );

    $tpl->setTemplateDir(__DIR__."/templates/v1/");
    $templateDir = $GLOBALS["template"][0]."/".$GLOBALS["template"][1].".tpl";
    $routerUrls = $GLOBALS["router"]->afterRoutes["GET"];
    $routerUrlsShow = array();
    foreach ( $routerUrls  as $urls){
        foreach ($showInNav as $key => $value){
            if($key == $urls["pattern"]){
                $urls["label"] = $value;
                $routerUrlsShow[] = $urls;
            }
        }
    }
    $GLOBALS["tpl"]->assign("routerUrls", $routerUrlsShow);
    $GLOBALS["tpl"]->assign("includeDir", "/templates/v1/".$GLOBALS["template"][0]."/");
    $tpl->display($templateDir);
});



<?php

require __DIR__ . "/DB.php";
require __DIR__ . "/Router.php";
require __DIR__ . "/Routers.php";

$router = new Router;
$router->setRouters($routes);

$url = $_SERVER["REQUEST_URI"];
require __DIR__ . "/../api/" . $router->direct($url);

?>
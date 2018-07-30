<?php

class Router
{
    private $router = [];

    function setRouters($routers)
    {
        $router = $routers;
    }

    function direct($url)
    {
        return "login.php";
    }
}


?>
<?php
require __DIR__ . '/../routers/switchrouter.php';
//session_start();

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new SwitchRouter();
$router->route($uri);
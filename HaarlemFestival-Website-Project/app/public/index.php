<?php
//require __DIR__ . '/../routers/router.php';
session_start();

$uri = trim($_SERVER['REQUEST_URI'], '/');

//$router = new();
$router->route($uri);
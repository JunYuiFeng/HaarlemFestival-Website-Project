<?php
require __DIR__ . '/../routers/patternrouter.php';
require_once __DIR__ . '/../models/reservation.php';

session_start();

$uri = trim($_SERVER['REQUEST_URI'], '/');
$router = new PatternRouter();
$router->route($uri);
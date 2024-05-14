<?php

$url = $_SERVER['REQUEST_URI'];
$url = explode("?", $url);

switch ($url[0]) {
  case '/':
    require_once __DIR__ .  '/view/home.php';
    break;
  case '/login':
    require_once __DIR__ .  '/view/login.php';
    break;
  case '/Form':
    require_once __DIR__ . '/view/adminform.php';
    break;
  case '/Logout':
    require_once __DIR__ .  '/controller/logout.php';
    break;
  case '/dash':
    require_once __DIR__ . '/view/dashboard.php';
    break;
  case '/Home':
    require_once __DIR__ . '/view/home.php';
    break;
  default:
    require_once __DIR__ . '/view/login.php';
}

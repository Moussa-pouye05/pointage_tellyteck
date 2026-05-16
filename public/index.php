<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/constants.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    $isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    $sessionPath = __DIR__ . '/../storage/sessions';

    if (!is_dir($sessionPath)) {
        mkdir($sessionPath, 0775, true);
    }

    session_name('POINTAGE_SESSION');
    session_save_path($sessionPath);
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => BASE_PATH ?: '/',
        'domain' => '',
        'secure' => $isHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

use App\Core\Router;

$router = new Router();

require_once __DIR__ . '/../config/routes.php';

$uri = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$basePath = parse_url(BASE_PATH, PHP_URL_PATH) ?: '';
$requestPath = parse_url($uri, PHP_URL_PATH) ?: '/';

if ($basePath !== '' && strpos($requestPath, $basePath) === 0) {
    $query = parse_url($uri, PHP_URL_QUERY);
    $path = substr($requestPath, strlen($basePath)) ?: '/';
    $uri = $path . ($query ? '?' . $query : '');
}

$router->dispatch($uri, $method);

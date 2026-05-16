<?php

$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/pointage_tellyteck/public/index.php');
$requestUri = str_replace('\\', '/', $_SERVER['REQUEST_URI'] ?? '/pointage_tellyteck');
$projectPath = preg_replace('#/public/index\.php$#', '', $scriptName) ?: '/pointage_tellyteck';
$publicPath = $projectPath . '/public';

if (strpos($requestUri, $publicPath) === 0) {
    $basePath = $publicPath;
} else {
    $basePath = $projectPath;
}

$isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
$scheme = $isHttps ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';

define('BASE_PATH', rtrim($basePath, '/'));
define('BASE_URL', $scheme . '://' . $host . BASE_PATH);
define('ASSET_URL', BASE_URL . '/assets');
define('APP_NAME', 'pointage_tellyteck');
define('SESSION_TIMEOUT', 1800);

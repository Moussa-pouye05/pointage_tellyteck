<?php

// Détermination simple et fiable de BASE_URL pour XAMPP
$isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
$scheme = $isHttps ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';

// Chemin du projet pour XAMPP
// Assume que le projet est dans /pointage_tellyteck
define('BASE_PATH', '/pointage_tellyteck');
define('BASE_URL', $scheme . '://' . $host . BASE_PATH);
define('ASSET_URL', BASE_URL . '/public/assets');
define('APP_NAME', 'pointage_tellyteck');
define('SESSION_TIMEOUT', 1800);

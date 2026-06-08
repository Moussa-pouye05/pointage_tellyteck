<?php
// Bootstrap minimal pour compatibilité déploiement (GitHub/serveur)
// Redirige (charge) le front controller public/index.php

$publicIndex = __DIR__ . '/public/index.php';

if (file_exists($publicIndex)) {
    require $publicIndex;
    exit;
}

http_response_code(500);
echo "Front controller introuvable: public/index.php";


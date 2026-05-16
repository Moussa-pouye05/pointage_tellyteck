<?php

namespace App\Core;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get(string $uri, string $action): void
    {
        $this->routes['GET'][$this->normalizeUri($uri)] = $action;
    }

    public function post(string $uri, string $action): void
    {
        $this->routes['POST'][$this->normalizeUri($uri)] = $action;
    }

    public function dispatch(string $uri, string $method): void
    {
        $uri = $this->normalizeUri($uri);
        $method = strtoupper($method);
        $action = $this->routes[$method][$uri] ?? null;

        if ($action === null) {
            http_response_code(404);
            echo '404 - Page introuvable';
            return;
        }

        [$controllerName, $methodName] = explode('@', $action);
        $controllerClass = 'App\\Controllers\\' . $controllerName;

        if (!class_exists($controllerClass) || !method_exists($controllerClass, $methodName)) {
            http_response_code(500);
            echo 'Erreur serveur: action introuvable';
            return;
        }

        $controller = new $controllerClass();
        $controller->$methodName();
    }

    private function normalizeUri(string $uri): string
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $path = '/' . trim($path, '/');

        return $path === '/' ? '/' : rtrim($path, '/');
    }
}

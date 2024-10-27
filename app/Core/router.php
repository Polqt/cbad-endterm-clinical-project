<?php

namespace Core;

class Router
{
    protected $routes = [];
    protected $basePath;

    public function __construct($basePath = '') {
        $this->basePath = $basePath;
    }

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller
        ];
        return $this;
    }
    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }
    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }
    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }
    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }
    public function routeController($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // echo "Routing to controller: {$route['controller']}";
                return require base_path($route['controller']);
            }
        }
        // echo "404 Not Found - No route matched <br>"; 
        $this->abort(404);
    }
    protected function abort($code = 404)
    {
        http_response_code($code);
        require "app/Controllers/{$code}.php";
        die();
    }
}

function base_path($path = '') {
    return $_SERVER['DOCUMENT_ROOT'] . '/Cloud Based Projects/Project/' . ltrim($path, '/');
}

$router = new Router();
$routes = require 'routes.php';
$basePath = '/Cloud Based Projects/Project';

function getUriPath($basePath) {
    $requestUri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $uri = rtrim(preg_replace('/\.php$/', '', str_replace($basePath, '', $requestUri)), '/');
    return $uri === '' ? '/' : $uri;
}

$uri = getUriPath($basePath);

// echo "Parsed URI: $uri <br>";
// var_dump($uri);

$method = $_SERVER['REQUEST_METHOD'];
$router->routeController($uri, $method);

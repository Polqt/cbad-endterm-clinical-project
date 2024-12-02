<?php

namespace Core;

class Router
{
    protected $routes = [];
    protected $basePath;

    public function __construct($basePath = '')
    {
        $this->basePath = $basePath;
    }

    public function add($method, $uri, $controller, $middleware = null)
    {
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller,
            'middleware' => $middleware,
        ];
        return $this;
    }

    public function get($uri, $controller, $middleware = null)
    {
        return $this->add('GET', $uri, $controller, $middleware);
    }

    public function post($uri, $controller, $middleware = null)
    {
        return $this->add('POST', $uri, $controller, $middleware);
    }

    public function routeController($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // Execute middleware if specified
                if (isset($route['middleware'])) {
                    $middleware = $route['middleware'];
                    if (is_callable($middleware)) {
                        $middleware();
                    }
                }
                // Load the controller
                return require base_path($route['controller']);
            }
        }

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

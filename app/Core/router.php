<?php

class Router {

    protected $routes = [];

    public function add($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller
        ];

        return $this;
    }

    public function get($uri, $controller) {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        return $this->add('POST', $uri, $controller);
    }

    public function put($uri, $controller) {
        return $this->add('PUT', $uri, $controller);
    }

    public function patch($uri, $controller) {
        return $this->add('PATCH', $uri, $controller);
    }

    public function delete($uri, $controller) {
        return $this->add('DELETE', $uri, $controller);
    }

    public function route($uri, $method) {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require $route['controller'];
            }
        }

        $this->abort(404);
    }

    protected function abort($code = 404) {
        http_response_code($code);
        require "app/Controllers/{$code}.php";
        die();
    }
}

$router = new Router();
$routes = require 'app/Core/routes.php';

$basePath = '/Cloud Based Projects/Project';

function getUriPath($basePath) {
    $requestUri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    return rtrim(preg_replace('/\.php$/', '', str_replace($basePath, '', $requestUri)), '/');
}

$uri = getUriPath($basePath);

if ($uri === '') {
    $uri = '/';
};

$method = $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);

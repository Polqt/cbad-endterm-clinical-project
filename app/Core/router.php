<?php

$basePath = '/Cloud Based Projects/Project';

function getUriPath($basePath)
{
    $requestUri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    return rtrim(preg_replace('/\.php$/', '', str_replace($basePath, '', $requestUri)), '/');
}

$uri = getUriPath($basePath);

// echo "Parsed URI: $uri <br>";
// var_dump($uri);

if ($uri === '') {
    $uri = '/';
}

$routes = [
    '/' => 'app/Controllers/log/index.php',
    '/register' => 'app/Controllers/log/register.php',
    '/admin-dashboard' => 'app/Controllers/admin/dashboard.php',
    '/user-dashboard' => 'app/Controllers/user/dashboard.php',
];

function routeController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        // echo "Route matched: " . $routes[$uri] . "<br>"; 
        require $routes[$uri];
    } else {
        // echo "Failed to match URI: $uri <br>"; 
        abort(404);
    }
}

function abort($error_code = 404)
{
    http_response_code($error_code);
    // echo "Sorry, page not found";
    require "app/Controllers/{$error_code}.php";
    die();
}

routeController($uri, $routes);
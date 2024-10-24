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
    '/' => 'app/Controllers/index.php',
    '/register' => 'app/Controllers/register.php',
    '/forgot_password' => 'app/Controllers/forgot_password.php',  
];


if (array_key_exists($uri, $routes)) {
    // echo "Route matched: " . $routes[$uri] . "<br>"; 
    require $routes[$uri];
} else {
    // echo "Failed to match URI: $uri <br>"; 
    http_response_code(404);
    echo "Sorry, page not found";
}

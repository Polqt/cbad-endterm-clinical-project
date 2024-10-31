<?php

use Core\Response;


function urlIs($value) {
    $currentUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $baseUrl = parse_url(BASE_URL, PHP_URL_PATH) ?? '';

    if ($baseUrl && strpos($currentUrl, $baseUrl) === 0) {
        $currentUrl = substr($currentUrl, strlen($baseUrl));
    };

    return trim($currentUrl, '/') === trim($value, '/');
}


function getRolesBasedUrls() {
    $userRole = $_SESSION['user']['role'] ?? null;

    return [
        'dashboard' => $userRole === 'admin' ? '/admin/dashboard' : '/user/dashboard',
        'services' => $userRole === 'admin' ? '/admin/services' : '/user/services',
        'history' => $userRole === 'admin' ? '/admin/history' : '/user/history',
    ];
}

function getDashboardUrl() {
    $urls = getRolesBasedUrls();
    return $urls['dashboard'];
};

function getServicesUrl() {
    $urls = getRolesBasedUrls();
    return $urls['services'];
};

function getHistoryUrl() {
    $urls = getRolesBasedUrls();
    return $urls['history'];
};


<?php

session_start();

function urlIs($value)
{
    $currentUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $baseUrl = parse_url(BASE_URL, PHP_URL_PATH) ?? '';

    if ($baseUrl && strpos($currentUrl, $baseUrl) === 0) {
        $currentUrl = substr($currentUrl, strlen($baseUrl));
    };

    return trim($currentUrl, '/') === trim($value, '/');
}

function getRolesBasedUrls()
{
    $userRole = $_SESSION['user']['role'] ?? null;

    return [
        'dashboard' => $userRole === 'admin' ? '/admin/dashboard' : '/user/dashboard',
        'register_patient' => '/admin/register-patient',
        'patient_records' => '/admin/patient-records',
        'medical_history' => '/user/medical-history',
        'profile' => $userRole === 'admin' ? '/admin/profile' : '/user/profile'
    ];
}

function getDashboardUrl()
{
    $urls = getRolesBasedUrls();
    return $urls['dashboard'];
}

function getRegisterPatientUrl()
{
    $urls = getRolesBasedUrls();
    return $urls['register_patient'];
}

function getPatientsUrl()
{
    $urls = getRolesBasedUrls();
    return $urls['patient_records'];
}

function getMedicalHistoryUrl()
{
    $urls = getRolesBasedUrls();
    return $urls['medical_history'];
}

function getProfileUrl()
{
    $urls = getRolesBasedUrls();
    return $urls['profile'];
}

function getMenuItems()
{
    $userRole = $_SESSION['user']['role'] ?? null;

    $icons = [
        'dashboard' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
        </svg>',
        'patients' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
        </svg>',
        'register' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus <?=  ?>" viewBox="0 0 16 16">
            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
        </svg>',
        'medical-history' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
        </svg>',
        'profile' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
        </svg>'
    ];

    if ($userRole === 'admin') {
        return [
            [
                'title' => 'Dashboard',
                'url' => getDashboardUrl(),
                'icon' => $icons['dashboard'],
                'active' => urlIs(getDashboardUrl())
            ],
            [
                'title' => 'Register Patient',
                'url' => getRegisterPatientUrl(),
                'icon' => $icons['register'],
                'active' => urlIs(getRegisterPatientUrl())
            ],
            [
                'title' => 'Patient Records',
                'url' => getPatientsUrl(),
                'icon' => $icons['patients'],
                'active' => urlIs(getPatientsUrl())
            ],
            [
                'title' => 'Profile',
                'url' => getProfileUrl(),
                'icon' => $icons['profile'],
                'active' => urlIs(getProfileUrl())
            ]
        ];
    } else {
        return [
            [
                'title' => 'Dashboard',
                'url' => getDashboardUrl(),
                'icon' => $icons['dashboard'],
                'active' => urlIs(getDashboardUrl())
            ],
            [
                'title' => 'Medical History',
                'url' => getMedicalHistoryUrl(),
                'icon' => $icons['medical-history'],
                'active' => urlIs(getMedicalHistoryUrl())
            ],
            [
                'title' => 'Profile',
                'url' => getProfileUrl(),
                'icon' => $icons['profile'],
                'active' => urlIs(getProfileUrl())
            ]
        ];
    }
}

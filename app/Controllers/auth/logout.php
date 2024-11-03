<?php
define('BASE_URL', '/Cloud Based Projects/Project');
session_start();
session_destroy();
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Location: ' . BASE_URL . '/');
exit();

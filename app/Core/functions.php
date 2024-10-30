<?php

use Core\Response;

function urlIs($value) {
    return basename($_SERVER['SCRIPT_NAME']) === $value;
}

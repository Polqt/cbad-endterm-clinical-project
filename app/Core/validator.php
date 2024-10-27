<?php

namespace Core;

class Validator {

    public static function minLength(string $value, int $minLength) : bool {
        return strlen($value) >= $minLength;
    }
}
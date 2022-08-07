<?php

if (! function_exists('purifyTelephone')) {
    function purifyTelephone($number)
    {
        $number = trim(str_replace(['.', ' ', '+', '-'], '', $number));
        if ('0' === substr($number, 0, 1)) {
            $number = substr_replace($number, '62', 0, 1);
        }

        return trim($number);
    }
}

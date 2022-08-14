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

if (! function_exists('dayOptions')) {
    function dayOptions()
    {
        return [
            ['value' => 'sunday', 'text' => __('day.sunday')],
            ['value' => 'monday', 'text' => __('day.monday')],
            ['value' => 'tuesday', 'text' => __('day.tuesday')],
            ['value' => 'wednesday', 'text' => __('day.wednesday')],
            ['value' => 'thursday', 'text' => __('day.thursday')],
            ['value' => 'friday', 'text' => __('day.friday')],
            ['value' => 'saturday', 'text' => __('day.saturday')],
        ];
    }
}

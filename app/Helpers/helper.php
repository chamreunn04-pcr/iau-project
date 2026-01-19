<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('active_class')) {
    function active_class($routes, $class = 'active', $show = false)
    {
        $active = false;

        if (is_array($routes)) {
            foreach ($routes as $route) {
                if (Route::is($route)) {
                    $active = true;
                    break;
                }
            }
        } else {
            if (Route::is($routes)) {
                $active = true;
            }
        }

        if ($show) {
            return $active ? 'show' : '';
        }

        return $active ? $class : '';
    }
}

// for number localization
if (! function_exists('local_number')) {
    function local_number($number)
    {
        if (app()->getLocale() !== 'km') {
            return $number;
        }

        $khmer = ['០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩'];
        $arabic = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($arabic, $khmer, $number);
    }
}

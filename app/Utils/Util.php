<?php

namespace App\Utils;

use Illuminate\Support\Str;

class Util
{

    protected static $instance  = null;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function generateUuId()
    {
        return (string) Str::orderedUuid();
    }
}

<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class Helper
{

    public static function isActiveRoute($routeName){

        return Route::currentRouteName() === $routeName;
    }
}

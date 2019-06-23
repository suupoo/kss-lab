<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FileCheck extends Facade
{
    protected static function getFacadeAccessor() {
        return 'fileCheck';
    }
}
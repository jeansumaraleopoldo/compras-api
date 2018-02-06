<?php

namespace Betha\Compras\App\Facades;

use Dotenv\Dotenv;

class Env
{
    public static function load()
    {
        (new Dotenv(__DIR__.'/../../../'))->load();
    }
}
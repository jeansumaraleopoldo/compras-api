<?php

namespace Betha\Compras\App\Factories;

use Exception;

class ExceptionFactory
{
    public static function naoEncontrado($mensagem)
    {
        return new Exception($mensagem);
    }
}
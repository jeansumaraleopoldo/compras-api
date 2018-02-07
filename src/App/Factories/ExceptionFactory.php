<?php

namespace Betha\Compras\App\Factories;

use Exception;

class ExceptionFactory
{
    public static function erroException($mensagem)
    {
        return new Exception($mensagem);
    }
}
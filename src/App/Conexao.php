<?php

namespace Betha\Compras\App;

use Betha\Compras\App\Factories\ConexaoFactory;

class Conexao
{
    public static function criar()
    {
        $conexaoFactory = new ConexaoFactory(getenv('DB_NAME'));
        $conexaoFactory->setServidor(getenv('DB_SERVER'));
        $conexaoFactory->setUsuario(getenv('DB_USER'));
        $conexaoFactory->setSenha(getenv('DB_PASS'));
        return $conexaoFactory;
    }
}
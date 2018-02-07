<?php

namespace Betha\Compras\App\Factories;


use Betha\Compras\Domains\Produto\Produto;

class ProdutoFactory
{
    /**
     * @param array $registro
     * @return Produto
     */
    public static function make(array $registro)
    {
        return (new Produto())
            ->setNome($registro['nome'])
            ->setValor($registro['valor']);
    }
}
<?php

namespace Betha\Compras\Domains\Produto;

class ProdutoToArray
{
    /**
     * @param Produto[] $registros
     * @return array
     */
    public static function converterArray(array $registros)
    {
        return array_map(function (Produto $produto) {
            return $produto->toArray();
        }, $registros);
    }
}
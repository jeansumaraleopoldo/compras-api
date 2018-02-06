<?php

namespace Betha\Compras\Domains\Produto;

interface IProdutoRepository
{
    /**
     * @return Produto[]
     */
    public function getProdutos();
}
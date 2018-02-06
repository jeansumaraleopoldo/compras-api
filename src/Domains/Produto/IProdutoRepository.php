<?php

namespace Betha\Compras\Domains\Produto;

interface IProdutoRepository
{
    /**
     * @param $id
     * @return Produto
     */
    public function getProdutoPorId($id);

    /**
     * @return Produto[]
     */
    public function getProdutos();
}
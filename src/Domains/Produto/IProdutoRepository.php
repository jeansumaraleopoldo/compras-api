<?php

namespace Betha\Compras\Domains\Produto;

interface IProdutoRepository
{
    /**
     * @param Produto $produto
     * @return Produto
     */
    public function adicionarProduto(Produto $produto);

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
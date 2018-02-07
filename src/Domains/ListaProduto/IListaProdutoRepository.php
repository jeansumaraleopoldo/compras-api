<?php

namespace Betha\Compras\Domains\ListaProduto;

use Betha\Compras\Domains\Lista\Lista;
use Betha\Compras\Domains\Produto\Produto;

interface IListaProdutoRepository
{
    /**
     * @param Lista $lista
     * @return Produto[]
     */
    public function buscarProdutosDeUmaLista(Lista $lista);
}
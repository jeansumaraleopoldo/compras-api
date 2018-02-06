<?php

namespace Betha\Compras\Domains\Lista;

use Betha\Compras\Domains\Produto\Produto;

interface IListaRepository
{
    /**
     * @param Produto[]
     */
    public function adicionarLista(array $produtos);
}
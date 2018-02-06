<?php

namespace Betha\Compras\Domains\Lista;

interface IListaRepository
{
    /**
     * @param array $produtos
     * @return Lista
     */
    public function adicionarLista(array $produtos);
}
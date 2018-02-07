<?php

namespace Betha\Compras\Domains\Lista;

interface IListaRepository
{
    /**
     * @param array $produtos
     * @return Lista
     */
    public function adicionarLista(array $produtos);

    /**
     * @return Lista[]
     */
    public function buscarListas();

    /**
     * @param $id
     * @return Lista
     */
    public function buscarListaPorId($id);
}
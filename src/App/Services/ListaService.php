<?php

namespace Betha\Compras\App\Services;

use Betha\Compras\Domains\Lista\Lista;
use Betha\Compras\Domains\Lista\IListaRepository;
use Betha\Compras\Domains\Produto\Produto;

class ListaService
{
    private $listaRepository;

    /**
     * ListaService constructor.
     * @param IListaRepository $listaRepository
     */
    public function __construct(IListaRepository $listaRepository)
    {
        $this->listaRepository = $listaRepository;
    }

    /**
     * @param Produto[] $produtos
     * @return Lista
     */
    public function adicionarLista(array $produtos)
    {
        return $this->listaRepository->adicionarLista($produtos);
    }

    /**
     * @return array
     */
    public function buscarListas()
    {
        return array_map(function (Lista $lista){
            return $lista->toArray();
        }, $this->listaRepository->buscarListas());
    }

    /**
     * @param $id
     * @return Lista
     */
    public function buscarListaPorId($id)
    {
        return $this->listaRepository->buscarListaPorId($id);
    }
}
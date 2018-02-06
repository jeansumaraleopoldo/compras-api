<?php

namespace Betha\Compras\App\Services;

use Betha\Compras\Domains\Lista\Lista;
use Betha\Compras\Domains\Lista\IListaRepository;
use Betha\Compras\Domains\Produto\Produto;

class ListaService
{
    private $listaRepository;

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
}
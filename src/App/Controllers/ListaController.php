<?php

namespace Betha\Compras\App\Controllers;

use Betha\Compras\App\Services\ListaService;
use Betha\Compras\App\Services\ProdutoService;
use Betha\Compras\Infrastructure\Repositories\ListaRepository;
use Betha\Compras\Infrastructure\Repositories\ProdutoRepository;

class ListaController extends IController
{
    private $listaService;

    public function __construct()
    {
        $this->listaService = new ListaService(new ListaRepository());
    }

    public function adicionarLista()
    {
        $dados = $this->getFormData()['dados'];
        $produtos = (new ProdutoService(new ProdutoRepository()))->getProdutosPorId($dados);
        $lista = $this->listaService->adicionarLista($produtos);
        return $this->json($lista->toArray());
    }

    public function buscarListas()
    {
        return $this->json($this->listaService->buscarListas());
    }

    public function buscarListaPorId($id)
    {
        return $this->json($this->listaService->buscarListaPorId($id)->toArray());
    }
}
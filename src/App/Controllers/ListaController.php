<?php

namespace Betha\Compras\App\Controllers;

use Betha\Compras\App\Services\ListaService;
use Betha\Compras\App\Services\ProdutoService;
use Betha\Compras\Infrastructure\Repositories\ListaRepository;
use Betha\Compras\Infrastructure\Repositories\ProdutoRepository;

class ListaController extends IController
{
    public function adicionarLista()
    {
        $dados    = $this->getFormData()['dados'];
        $produtos = (new ProdutoService(new ProdutoRepository()))->getProdutosPorId($dados);
        $lista    = (new ListaService(new ListaRepository()))->adicionarLista($produtos);
        return $this->json($lista->toArray());
    }
}
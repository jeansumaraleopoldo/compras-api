<?php

namespace Betha\Compras\App\Controllers;

use Betha\Compras\App\Services\ProdutoService;
use Betha\Compras\Domains\Produto\Produto;
use Betha\Compras\Infrastructure\Repositories\ProdutoRepository;

class ProdutoController extends IController
{
    public function getProdutos()
    {
        $produtos = (new ProdutoService(new ProdutoRepository()))->getProdutos();
        $produtos = array_map(function (Produto $produto) {
            return $produto->toArray();
        }, $produtos);
        return $this->json($produtos);
    }
}
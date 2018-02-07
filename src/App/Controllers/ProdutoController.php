<?php

namespace Betha\Compras\App\Controllers;

use Betha\Compras\App\Factories\ProdutoFactory;
use Betha\Compras\App\Services\ProdutoService;
use Betha\Compras\Domains\Produto\Produto;
use Betha\Compras\Infrastructure\Repositories\ProdutoRepository;

class ProdutoController extends IController
{
    private $produtoService;

    public function __construct()
    {
        $this->produtoService = new ProdutoService(new ProdutoRepository());
    }

    public function adicionarProduto()
    {
        $produto = ProdutoFactory::make($this->getFormData());
        return $this->json($this->produtoService->adicionarProduto($produto)->toArray());
    }

    public function buscarProdutos()
    {
        $produtos = $this->produtoService->getProdutos();
        $produtos = array_map(function (Produto $produto) {
            return $produto->toArray();
        }, $produtos);
        return $this->json($produtos);
    }
}
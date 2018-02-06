<?php

namespace Betha\Compras\App\Services;

use Betha\Compras\Domains\Produto\IProdutoRepository;
use Betha\Compras\Domains\Produto\Produto;

class ProdutoService
{
    private $produtoRepository;

    public function __construct(IProdutoRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    /**
     * @return Produto[]
     */
    public function getProdutos()
    {
        return $this->produtoRepository->getProdutos();
    }

    /**
     * @param $registros
     * @return Produto[]
     */
    public function getProdutosPorId($registros)
    {
        $produtos = array_map(function ($registro) {
            $produto = $this->produtoRepository->getProdutoPorId($registro['produto']['id']);
            return $produto
                ->setQuantidade($registro['quantidade'])
                ->setValorTotal($registro['valorTotal']);
        }, $registros);
        return $produtos;
    }
}
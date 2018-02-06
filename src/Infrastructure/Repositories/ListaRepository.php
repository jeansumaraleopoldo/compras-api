<?php

namespace Betha\Compras\Infrastructure\Repositories;

use Betha\Compras\Domains\Produto\Produto;
use Betha\Compras\Infrastructure\DAOs\ListaDao;
use Betha\Compras\Infrastructure\DAOs\ListaProdutoDao;

class ListaRepository
{
    /**
     * @param Produto[]
     */
    public function adicionarLista(array $produtos)
    {
        $idLista = (new ListaDao())->adicionar([
            'valor_total' => ''
        ]);
        foreach ($produtos as $produto) {
            (new ListaProdutoDao())->adicionar([
                'id_lista'    => $idLista,
                'id_produto'  => $produto->getNome(),
                'qtd_produto' => $produto->getQuantidade()
            ]);
        }
    }
}
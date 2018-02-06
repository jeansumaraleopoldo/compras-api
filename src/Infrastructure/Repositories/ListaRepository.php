<?php

namespace Betha\Compras\Infrastructure\Repositories;

use Betha\Compras\App\Factories\ExceptionFactory;
use Betha\Compras\Domains\Lista\IListaRepository;
use Betha\Compras\Domains\Lista\Lista;
use Betha\Compras\Domains\Produto\Produto;
use Betha\Compras\Infrastructure\DAOs\ListaDao;
use Betha\Compras\Infrastructure\DAOs\ListaProdutoDao;

class ListaRepository implements IListaRepository
{
    /**
     * @param Produto[] $produtos
     * @return Lista
     * @throws \Exception
     */
    public function adicionarLista(array $produtos)
    {
        $idLista = (new ListaDao())->adicionar([
            'created_at' => date('Y-m-d H:i:s')
        ]);
        if (is_null($idLista)) {
            throw ExceptionFactory::naoEncontrado('Não foi possível adicionar uma lista');
        }
        foreach ($produtos as $produto) {
            (new ListaProdutoDao())->adicionar([
                'id_lista'    => $idLista,
                'id_produto'  => $produto->getNome(),
                'qtd_produto' => $produto->getQuantidade()
            ]);
        }
        return (new Lista())
            ->setId($idLista)
            ->setProdutos($produtos);
    }
}
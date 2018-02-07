<?php

namespace Betha\Compras\Infrastructure\Repositories;

use Betha\Compras\App\Factories\ExceptionFactory;
use Betha\Compras\Domains\Lista\IListaRepository;
use Betha\Compras\Domains\Lista\Lista;
use Betha\Compras\Domains\Produto\Produto;
use Betha\Compras\Infrastructure\DAOs\ListaDao;
use Betha\Compras\Infrastructure\DAOs\ListaProdutoDao;
use Exception;

class ListaRepository implements IListaRepository
{
    /**
     * @param Produto[] $produtos
     * @return Lista
     * @throws Exception
     */
    public function adicionarLista(array $produtos)
    {
        $idLista = (new ListaDao())->adicionar([
            'created_at' => date('Y-m-d H:i:s')
        ]);
        if (is_null($idLista)) {
            throw ExceptionFactory::erroException('Não foi possível adicionar uma lista');
        }
        foreach ($produtos as $produto) {
            (new ListaProdutoDao())->adicionar([
                'id_lista'    => $idLista,
                'id_produto'  => $produto->getCodigo(),
                'qtd_produto' => $produto->getQuantidade()
            ]);
        }
        return (new Lista())
            ->setId($idLista)
            ->setProdutos($produtos);
    }

    /**
     * @return Lista[]
     * @throws Exception
     */
    public function buscarListas()
    {
        $registros = (new ListaDao())->listar(['deleted_at' => null]);
        if(is_null($registros)){
            throw ExceptionFactory::erroException('Não foi encontrado nenhuma lista');
        }
        return array_map(function ($registro){
            return $this->criarLista($registro['id']);
        }, $registros);
    }

    /**
     * @param $id
     * @return Lista
     * @throws Exception
     */
    public function buscarListaPorId($id)
    {
        $registro = (new ListaDao())->encontrar([
            'id'         => $id,
            'deleted_at' => null
        ]);
        if(is_null($registro)){
            throw ExceptionFactory::erroException('Não foi encontrado nenhuma lista para este id');
        }
        return $this->criarLista($registro['id']);
    }

    /**
     * @param $id
     * @return Lista
     * @throws Exception
     */
    private function criarLista($id)
    {
        $lista = (new Lista())->setId($id);
        return $lista->setProdutos((new ListaProdutoRepository())->buscarProdutosDeUmaLista($lista));
    }
}
<?php

namespace Betha\Compras\Infrastructure\Repositories;

use Betha\Compras\App\Factories\ExceptionFactory;
use Betha\Compras\Domains\Produto\IProdutoRepository;
use Betha\Compras\Domains\Produto\Produto;
use Betha\Compras\Infrastructure\DAOs\ProdutoDao;
use Exception;

class ProdutoRepository implements IProdutoRepository
{
    /**
     * @param Produto $produto
     * @return Produto
     * @throws Exception
     */
    public function adicionarProduto(Produto $produto)
    {
        $idProduto = (new ProdutoDao())->adicionar([
            'nome'   => $produto->getNome(),
            'valor'  => $produto->getValor()
        ]);
        if(is_null($idProduto)){
            throw ExceptionFactory::erroException('Não foi possível inserir um produto');
        }
        return $produto->setCodigo($idProduto);
    }

    /**
     * @param $id
     * @return Produto
     * @throws Exception
     */
    public function getProdutoPorId($id)
    {
        $registro = (new ProdutoDao())->encontrar(['id' => $id]);
        if (is_null($registro)) {
            throw ExceptionFactory::erroException('Não foi encontrado nenhum produto.');
        }
        return (new Produto())
            ->setCodigo($registro['id'])
            ->setNome($registro['nome'])
            ->setValor($registro['valor']);
    }

    /**
     * @return array|Produto[]
     * @throws Exception
     */
    public function getProdutos()
    {
        $registros = (new ProdutoDao())->listar(['deleted_at' => null]);
        if (is_null($registros)) {
            throw ExceptionFactory::erroException('Não foi encontrado nenhum produto.');
        }
        return array_map(function ($registro) {
            return (new Produto())
                ->setCodigo($registro['id'])
                ->setNome($registro['nome'])
                ->setValor($registro['valor']);
        }, $registros);
    }
}
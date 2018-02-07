<?php

namespace Betha\Compras\Infrastructure\Repositories;

use Betha\Compras\App\Facades\DB;
use Betha\Compras\App\Factories\ExceptionFactory;
use Betha\Compras\Domains\Lista\Lista;
use Betha\Compras\Domains\ListaProduto\IListaProdutoRepository;
use Betha\Compras\Domains\Produto\Produto;
use Exception;

class ListaProdutoRepository implements IListaProdutoRepository
{
    /**
     * @param Lista $lista
     * @return array|Produto[]
     * @throws Exception
     */
    public function buscarProdutosDeUmaLista(Lista $lista)
    {
       $registros = DB::fetchAll("
            SELECT 
                produtos.id as id_produto,
                lista_produtos.qtd_produto
            FROM lista_produtos
            INNER JOIN produtos ON produtos.id = lista_produtos.id_produto AND produtos.deleted_at IS NULL
            WHERE id_lista = {$lista->getId()}
       ");
       if(!is_null($registros)){
           return array_map(function ($registro){
               $produto = (new ProdutoRepository())->getProdutoPorId($registro['id_produto']);
               return $produto->setQuantidade($registro['qtd_produto']);
           }, $registros);
       }
       return [];
    }
}
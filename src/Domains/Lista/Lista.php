<?php

namespace Betha\Compras\Domains\Lista;

use Betha\Compras\Domains\Produto\Produto;
use Betha\Compras\Domains\Produto\ProdutoToArray;

class Lista
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Produto[]
     */
    private $produtos;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Lista
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Produto[]
     */
    public function getProdutos()
    {
        return $this->produtos;
    }

    /**
     * @param Produto[] $produtos
     * @return Lista
     */
    public function setProdutos($produtos)
    {
        $this->produtos = $produtos;
        return $this;
    }

    public function toArray()
    {
        return [
            'id'       => $this->getId(),
            'produtos' => ProdutoToArray::converterArray($this->getProdutos())
        ];
    }
}
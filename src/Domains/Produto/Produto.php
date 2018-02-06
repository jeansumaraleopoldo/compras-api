<?php

namespace Betha\Compras\Domains\Produto;

class Produto
{
    /**
     * @var int
     */
    private $codigo;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var double
     */
    private $valor;
    /**
     * @var string
     */
    private $imagem;

    /**
     * @return int
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param int $codigo
     * @return Produto
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Produto
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     * @return Produto
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return string
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param string $imagem
     * @return Produto
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
        return $this;
    }

    public function toArray()
    {
        return [
            'id'     => $this->getCodigo(),
            'nome'   => $this->getNome(),
            'valor'  => $this->getValor(),
            'imagem' => $this->getImagem()
        ];
    }
}
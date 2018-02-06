<?php

namespace Betha\Compras\Infrastructure\DAOs;

use Betha\Compras\App\Crud;

abstract class IDao
{
    protected $tabela;

    /**
     * @return mixed
     */
    public function getTabela()
    {
        return $this->tabela;
    }

    /**
     * @param mixed $tabela
     */
    public function setTabela($tabela)
    {
        $this->tabela = $tabela;
    }

    public function adicionar(array $dados)
    {
        return (new Crud($this->getTabela()))->adicionar($dados);
    }

    public function excluir($condicao)
    {
        return (new Crud($this->getTabela()))->excluir($condicao);
    }

    public function encontrar($condicao)
    {
        $registro = (new Crud($this->getTabela()))->encontrar($condicao);
        if (!empty($registro)) {
            return $registro[0];
        }
        return null;
    }

    public function listar($condicao)
    {
        $registros = (new Crud($this->getTabela()))->encontrar($condicao);
        if (!empty($registros)) {
            return $registros;
        }
        return null;
    }

    public function atualizar($dados, $condicao)
    {
        return (new Crud($this->getTabela()))->atualizar($dados, $condicao);
    }
}
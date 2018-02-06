<?php

namespace Betha\Compras\App;


class Crud
{

    protected $debug = false;

    protected $tabela;

    protected $query;

    protected $medoo;

    public function __construct($tabela = null)
    {
        $this->tabela = $tabela;
        $this->medoo = Conexao::criar();
    }

    public function getTabela()
    {
        return $this->tabela;
    }

    public function isDebug()
    {
        return $this->debug;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    public function adicionar($dados)
    {
        $this->medoo->insert($this->tabela, $dados);
        return $this->medoo->id();
    }

    public function atualizar($dados, $condicao)
    {
        return $this->medoo->update($this->tabela, $dados, $condicao);
    }

    public function excluir($condicao)
    {
        return $this->medoo->delete($this->tabela, $condicao);
    }

    public function encontrar($condicao)
    {
        return $this->medoo->select($this->tabela, '*', $condicao);
    }

    public function executarFetchArray($sql)
    {
        return $this->medoo->query($sql)->fetchAll();
    }
}
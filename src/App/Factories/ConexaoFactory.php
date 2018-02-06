<?php

namespace Betha\Compras\App\Factories;

use Medoo\Medoo;

class ConexaoFactory
{
    private $servidor, $usuario, $senha, $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function conectar()
    {
        return new Medoo([
            'database_type' => 'mysql',
            'database_name' => $this->database,
            'server'        => $this->getServidor(),
            'username'      => $this->getUsuario(),
            'password'      => $this->getSenha(),
        ]);
    }

    /**
     * @return mixed
     */
    public function getServidor()
    {
        return $this->servidor;
    }

    /**
     * @param mixed $servidor
     */
    public function setServidor($servidor)
    {
        $this->servidor = $servidor;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
}
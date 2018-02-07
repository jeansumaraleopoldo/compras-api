<?php

namespace Betha\Compras\App\Facades;

use Betha\Compras\App\Crud;

class DB
{
    /**
     * @param $sql
     * @return array|null
     */
    public static function fetchAll($sql)
    {
        $crud = new Crud();
        if ($registros = $crud->executarFetchArray($sql)) {
            return $registros;
        }
        return null;
    }
}
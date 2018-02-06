<?php

use Betha\Compras\App\Controllers\ListaController;
use Betha\Compras\App\Controllers\ProdutoController;

$app->group('/v1', function () use ($app) {
    $app->post('/lista', function () use ($app) {
        echo (new ListaController())->adicionarLista();
    });
    $app->get('/produtos', function () use ($app) {
        echo (new ProdutoController())->getProdutos();
    });
});
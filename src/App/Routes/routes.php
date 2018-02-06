<?php

use Betha\Compras\App\Controllers\ProdutoController;

$app->group('/v1', function () use ($app) {
    $app->get('/produtos', function () use ($app) {
        echo (new ProdutoController())->getProdutos();
    });
});
<?php

use Betha\Compras\App\Controllers\ListaController;
use Betha\Compras\App\Controllers\ProdutoController;

$app->group('/v1', function () use ($app) {
    $app->group('/listas', function () use($app){
        $app->get('', function () use($app){
            echo (new ListaController())->buscarListas();
        });
        $app->get('/:id', function ($id) use($app){
            echo (new ListaController())->buscarListaPorId($id);
        });
        $app->post('', function () use ($app) {
            echo (new ListaController())->adicionarLista();
        });
    });
    $app->group('/produtos', function () use($app){
        $app->get('', function () use ($app) {
            echo (new ProdutoController())->buscarProdutos();
        });
        $app->post('', function () use ($app) {
            echo (new ProdutoController())->adicionarProduto();
        });
    });
});
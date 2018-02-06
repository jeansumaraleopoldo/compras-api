<?php
date_default_timezone_set('America/Sao_Paulo');

// Força a exibição de erros e armazenamento do log
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__.'/error_log.txt');
error_reporting(E_ALL);

require __DIR__.'/vendor/autoload.php';
\Betha\Compras\App\Conexao::criar();

$app = new Slim\Slim([
    'debug' => false
]);
$app->response->headers->set('Content-Type', 'application/json');
$app->response->headers->set('Access-Control-Allow-Origin', '*');
$app->response->headers->set('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization');
$app->response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

require __DIR__.'/src/App/Routes/routes.php';
$app->error(function (Exception $e) use ($app) {
    $codigo = $e->getCode();
    if (!$codigo) {
        $codigo = 400;
    }
    $app->response->setStatus($codigo);
    echo json_encode([
        'message' => $e->getMessage(),
        'trace'   => $e->getTrace(),
    ]);
});
$app->run();

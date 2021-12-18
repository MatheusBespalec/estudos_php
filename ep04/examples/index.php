<?php

require __DIR__ . '/vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->group(null);
$router->get('/', function ($data) {
    echo '<h1>Olá,mundo!</h1>';
    var_dump($data);
});

$router->get('/contato', function ($data) {
    echo '<h1>Pagina Contato</h1>';
    var_dump($data);
});

$router->group('ops');
$router->get('/{errcode}', function ($data) {
    echo 'Erro ' . $data['errcode'] .'<br>';
    var_dump($data);
});

$router->dispatch();

if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}
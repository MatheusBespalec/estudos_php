<?php

require __DIR__ . '/vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

/*
 * Controllers
 */
$router->namespace('Source\App');

$router->group(null);
/*
 * Web
 * home
 */
$router->get('/', 'Web:home');
/*
 * Web
 * home
 */
$router->get('/{filters}', 'Web:home');
/*
 * Web
 * contact
 */
$router->get('/contato', 'Web:contact'); // Regras dinamicas devem sempre ir acima
/*
 * Web
 * contact
 */
$router->post('/contato', 'Web:contact');

$router->group('blog');

/*
 * Web
 * post
 */
$router->get('/{post_uri}', 'Web:post');
/*
 * Web
 * category
 */
$router->get('/categoria/{cat_uri}', 'Web:category');

$router->group('ooops');
/*
 * Web
 * error
 */
$router->get('/{errcode}', 'Web:error');

$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}
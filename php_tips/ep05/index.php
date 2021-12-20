<?php

require __DIR__ . '/vendor/autoload.php';

use Source\Models\Post;
use CoffeeCode\Paginator\Paginator;

$post = new Post();
$page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
$paginator = new Paginator('http://localhost/estudos_php/php_tips/ep05/?page=');
$paginator->pager($post->find()->count(), 2, $page, 2);

$posts = $post->find()->limit($paginator->limit())->offset($paginator->offset())->fetch(true);

echo "Pagina {$paginator->page()} de {$paginator->pages()}";

if ($posts) {
    foreach ($posts as $post) {
        echo "<h2>{$post->title}</h2><p>{$post->description}</p>";
    }
}

echo $paginator->render();
<?php

require __DIR__ . '/../vendor/autoload.php';

use Source\Models\User;

$user = (new User())->findById(6);

if ($user) {
    $user->destroy();
    die('Usuario deletado com sucesso!');
} else {
    echo '<pre>';
    var_dump($user);
    echo '</pre>';
}
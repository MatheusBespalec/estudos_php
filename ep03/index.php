<?php

require __DIR__ . "/vendor/autoload.php";

use Source\Support\Email;

$email = new Email();

$email->add(
    'Teste', 
    '<h1>Minha mensagem de teste</h1> Teste do corpo do meu email', 
    'Matheus Teste', 
    'matheusbespalec@gmail.com'
)->send();

if (! $email->error()) {
    echo 'Email enviado com sucesso!';
} else {
    echo $email->error()->getMessage();
}
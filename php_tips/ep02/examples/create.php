<?php

require __DIR__ . '/../vendor/autoload.php';

use Source\Models\User;
use Source\Models\Address;

$user = new User();
$user->first_name = 'Pedro';
$user->last_name = 'Afonso';
$user->genre = 'Male';
$user->save();

$addr = new Address();
$addr->add($user, 'Rua sem ideia de nome', '936');
$addr->save();

echo '<pre>';
var_dump($user);
echo '</pre>';
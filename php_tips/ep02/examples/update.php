<?php

require __DIR__ . '/../vendor/autoload.php';

use Source\Models\User;

$user = (new User())->findById(1);
$user->first_name = 'Jefferson';
$user->last_name = 'Albuquerque';
$user->save();

echo '<pre>';
var_dump($user);
echo '</pre>';
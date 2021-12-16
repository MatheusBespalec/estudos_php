<?php 

require __DIR__ . '/../vendor/autoload.php';

/*
use CoffeeCode\DataLayer\Connect;

$conn = Connect::getInstance();
$error = Connect::getError();

if ($error) {
    echo $error->getMessage();
    die();
}

$query = $conn->query("SELECT * FROM users");
echo '<pre>';
var_dump($query->fetchAll());
echo '</pre>';
*/

use Source\Models\User;

$user = new User();
$list = $user->find()->fetch(true);

/** @var $item \Source\Models\User */
foreach ($list as $item) {
    echo '<pre>';
    var_dump($item->data());
    foreach ($item->addresses() as $address) {
        var_dump($address->data());
    }
    echo '</pre>';
}
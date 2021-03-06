<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class CreditCard extends DataLayer
{
    public function __construct()
    {
        parent::__construct('credit_card', ['user_id', 'hash', 'brand', 'last_digits']);
    }
}
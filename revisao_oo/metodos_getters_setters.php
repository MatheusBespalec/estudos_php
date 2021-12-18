<?php

    class People
    {
        private $data = [];
        
        // Acionado quando definimos um valor para um atributo do objeto
        public function __set($name, $value):void
        {
            $this->data[$name] = $value;
        }

        // Acionado quando pegamos um atributo do objeto
        public function __get($name):mixed
        {
            return $this->data[$name];
        }
    }

    $people = new People();
    $people->name = 'Jorge';
    $people->years = 25;
    $people->role = 'Desenvolvedor';
    echo "$people->name tem $people->years anos e trabalha como $people->role";
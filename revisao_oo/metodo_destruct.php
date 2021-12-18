<?php

    class People
    {
        private $name;
        private $years;
        private $role;
        
        public function __construct($name, $years, $role)
        {
            $this->name = $name;
            $this->years = $years;
            $this->role = $role;
        }

        // Acionado na finalização do script ou quando o objeto é destruido
        public function __destruct()
        {
            echo 'destruindo obejto';
        }
    }

    $people = new People('Jorge', 25, 'Desenvolvedor');
    //unset($people);
    echo '<br>teste<br>';
<?php

$text = 'Meu texto' . PHP_EOL;

file_put_contents('test2.txt', $text, FILE_APPEND);
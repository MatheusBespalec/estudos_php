<?php
$handle = fopen('tet.csv', "r");

    while ($line = fgetcsv($handle)) {
        print_r($line);
    }
fclose($handle);
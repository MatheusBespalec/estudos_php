<?php

$file = fopen('dados1.txt', 'r');

stream_filter_append($file, 'string.toupper');

echo fread($file, filesize('dados1.txt'));


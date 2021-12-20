<?php

require __DIR__ . '/vendor/autoload.php';

use Faker\Provider\Lorem;
use Source\Models\Post;

for ($i = 0; $i < 3; $i++) {
    $post = new Post();
    $post->title = Lorem::text(80);
    $post->description = Lorem::paragraphs(2, true);
    $post->save();
}
<?php

$db = new App\Database('blog');
$data = $db->query('SELECT * FROM articles');
var_dump($data);
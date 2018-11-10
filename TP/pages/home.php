<?php

$pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', '');
/*$count = $pdo->exec('INSERT INTO articles SET titre="Mon titre", date="'.date('Y-m-d H:i:s') .'"');
var_dump($count); die;*/

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$response = $pdo->query('SELECT * FROM articles');
//var_dump($response->fetchAll(PDO::FETCH_OBJ));
$data = $response->fetchAll(PDO::FETCH_OBJ);
var_dump($data[0]->titre);
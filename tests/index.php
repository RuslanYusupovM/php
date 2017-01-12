<?php

require __DIR__ . '/../autoload.php';

$db = new \App\Db();

$query1 = 'UPDATE authors SET lastname=:lastname WHERE id=:id';
$query2 = 'UPDATE authorss SET lastname=:lastname WHERE id=:id'; //Запрос с ошибкой

$test1 = $db->execute($query1, ['lastname' => 'Example', 'id' => 1]);
$test2 = $db->execute($query2, ['lastname' => 'Example', 'id' => 1]);

assert(true === $test1);
assert(true === $test2);
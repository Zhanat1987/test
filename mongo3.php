<?php

// соединение
//$m = new MongoClient('mongodb://heroku:c3a9e55cf2ef8fdbaa0b3174ed4045b1@troup.mongohq.com:10081/app22637187');
$m = new MongoClient('mongodb://heroku:6b26dcd6b4edbe356ceeaec644521974@troup.mongohq.com:10081');
echo '<pre>';
var_dump($m);
echo '</pre>';
// получаем базу данных "testDb"
//$db = $m->testDb;
//$testCollection = $db->testCollection;
$db = $m->selectDB('app22637187');
$testCollection = $db->selectCollection('user');
$insert = ["user" => "demo@9lessons.info", "password" => md5("demo_password")];
$testCollection->insert($insert);
echo '<p>Записей в таблице - <b>' . $testCollection->count() . '</b></p>';
$rows = $testCollection->find();
foreach ($rows as $row) {
    echo '<pre>';
    var_dump($row);
    echo '</pre>';
}
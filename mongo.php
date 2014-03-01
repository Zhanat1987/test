<?php
/**
 * http://blog.mongohq.com/connect-to-mongohq/
 * https://devcenter.heroku.com/articles/mongohq
 * http://docs.mongohq.com/languages/php.html
 * http://www.amido.co.uk/chris-gray/compiling-php-extensions-like-mongo-and-memcache-on-heroku/
 * http://chrismcleod.me/2011/11/30/use-custom-php-extensions-on-heroku/
 */
// mongodb://{$dbuser}:{$dbpass}@{$dburl}:{$dbport}/{$dbname}
// cmd - mongo troup.mongohq.com:10081/app22637187 -u test -ptest
// соединение
$m = new MongoClient('mongodb://heroku:heroku@troup.mongohq.com:10081/app22637187');
//$m = new MongoClient('mongodb://heroku:c3a9e55cf2ef8fdbaa0b3174ed4045b1@troup.mongohq.com:10081');
echo '<pre>';
var_dump($m);
echo '</pre>';
// получаем базу данных "testDb"
//$db = $m->testDb;
//$testCollection = $db->testCollection;
$db = $m->selectDB('app22637187');
$testCollection = $db->selectCollection('testCollection');
$insert = ["user" => "demo@9lessons.info", "password" => md5("demo_password")];
$testCollection->insert($insert);
echo '<p>Записей в таблице - <b>' . $testCollection->count() . '</b></p>';
$rows = $testCollection->find();
foreach ($rows as $row) {
    echo '<pre>';
    var_dump($row);
    echo '</pre>';
}
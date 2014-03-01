<?php
header('Content-Type: text/html; charset=utf-8');
?>
<h1>heroku test merge</h1>
<script type="text/javascript" src="todo.js"></script>
<?php
echo '<p>Текущие дата и время - <b>' . date('m.d.Y H:i:s') . '</b></p>';
// соединение
$m = new MongoClient('mongodb://heroku:heroku@troup.mongohq.com:10081/app22637187');
// получаем базу данных "testDb"
$db = $m->testDb;
$testCollection = $db->testCollection;
$insert = array("user" => "demo@9lessons.info", "password" => md5("demo_password"));
$testCollection->insert($insert);
echo '<p>Записей в таблице - <b>' . $testCollection->count() . '</b></p>';
$rows = $testCollection->find();
foreach ($rows as $row) {
    echo '<pre>';
    var_dump($row);
    echo '</pre>';
}
phpinfo();

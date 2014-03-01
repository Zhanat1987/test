<?php

$connection_url = getenv("MONGOHQ_URL");
$m = new MongoClient($connection_url);
echo '<pre>';
var_dump($m);
echo '</pre>';
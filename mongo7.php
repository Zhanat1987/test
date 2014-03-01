<?php

$connection_url = getenv("MONGOHQ_URI");
$m = new MongoClient($connection_url);
echo '<pre>';
var_dump($m);
echo '</pre>';
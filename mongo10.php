<!-- PHP Mongo Docs: http://php.net/manual/en/class.mongodb.php -->
<!-- PHP Mongo Docs: http://php.net/manual/en/class.mongodb.php -->
<html>
<body>
<h1>MongoHQ Test</h1>
<?php
echo 'test<br />';
try {
//    ini_set ('extension', '/ext/mongo.so');
// connect to MongoHQ assuming your MONGOHQ_URL environment
// variable contains the connection string
    $connection_url = 'mongodb://test:a6de521abefc2fed4f5876855a3484f5@troup.mongohq.com:10081';
    echo $connection_url . '<br />';
// create the mongo connection object
//    $m = new MongoClient($connection_url);
    $m = new Mongo($connection_url);
// extract the DB name from the connection path
    $url = parse_url($connection_url);
    echo $url . '<br />';
    $db_name = preg_replace('/\/(.*)/', '$1', $url['path']);
    echo $db_name . '<br />';
// use the database we connected to
    $db = $m->selectDB($db_name);
    echo "<h2>Collections</h2>";
    echo "<ul>";
// print out list of collections
    $cursor = $db->listCollections();
    $collection_name = "";
    foreach ($cursor as $doc) {
        echo "<li>" . $doc->getName() . "</li>";
        $collection_name = $doc->getName();
    }
    echo "</ul>";
// print out last collection
    if ($collection_name != "") {
        $collection = $db->selectCollection($collection_name);
        echo "<h2>Documents in ${collection_name}</h2>";
// only print out the first 5 docs
        $cursor = $collection->find();
        $cursor->limit(5);
        echo $cursor->count() . ' document(s) found. <br/>';
        foreach ($cursor as $doc) {
            echo "<pre>";
            var_dump($doc);
            echo "</pre>";
        }
    }
// disconnect from server
    $m->close();
} catch (MongoConnectionException $e) {
    $error = <<<MongoConnectionException
Error connecting to MongoDB server, message -, {$e->getMessage()}, code - {$e->getCode()},
line - {$e->getLine()}, file - {$e->getFile()}.
MongoConnectionException;
    die($error);
} catch (MongoException $e) {
    die('Mongo Error: ' . $e->getMessage());
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
echo 'test 2<br />';
?>
</body>
</html> 
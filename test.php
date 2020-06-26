<?php
use MongoDB\Driver\Manager;
use MongoDB\Driver\Exception;
use MongoDB\Driver\Query;

require_once __DIR__.'/vendor/autoload.php';

try {
    $mng = new Manager;
    $query = new Query([]);

} catch(Exception $e) {
    
    $filename = basename(__FILE__);

    echo "The $filename script has experienced an error";
    echo "It failed with the following exception:\n";

    echo "Exception: ".$e->getMessage()."\n";
    echo "In file: ".$e->getFile()."\n";
    echo "On line: ".$e->getLine()."\n";
}
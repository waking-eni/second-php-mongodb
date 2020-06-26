<?php

use MongoDB\Driver\BulkWrite;
use MongoDB\BSON\ObjectId;
use MongoDB\Driver\Exception;
use MongoDB\Driver\Manager;

require_once __DIR__.'/../vendor/autoload.php';

if(isset($_POST['submit'])) {

    $bulk = new BulkWrite;
    $manager = new Manager("mongodb://localhost:27017");

    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $passwordhashed = password_hash($password, PASSWORD_DEFAULT);

    $user = [
        '_id' => new ObjectId,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'username' => $username,
        'password' => $passwordhashed
    ];

    try {
        $bulk->insert($user);
        $manager->executeBulkWrite("db.collection", $bulk);
        echo "User added";
    } catch(Exception $e) {
        die("Error encountered: ".$e);
    }

} else {
    header("Location: ../form.php");
	exit();
}
<?php

use MongoDB\Driver\BulkWrite;
use MongoDB\BSON\ObjectId;
use MongoDB\Driver\Exception;

require_once __DIR__.'/../vendor/autoload.php';

if(isset($_POST['submit'])) {

    $bulk = new BulkWrite;

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
        echo "User added";
    } catch(Exception $e) {
        die("Error encountered: ".$e);
    }

} else {
    header("Location: ../form.php");
	exit();
}
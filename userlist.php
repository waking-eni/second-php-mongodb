<?php
use MongoDB\Driver\Manager;
use MongoDB\Driver\Exception;
use MongoDB\Driver\Query;

require_once __DIR__.'/vendor/autoload.php';

echo "<a href='form.php'>Add new user</a>";
try {
    $manager = new Manager("mongodb://localhost:27017");
    $query = new Query;

    $rows = $query->executeQuery("db.collection", $query);

    echo "<table>
            <thead>
                <th>First name</th>
                <th>Last name</th>
                <th>Username</th>
            </thead>";

    foreach($rows as $row) {
        echo "<tr>".
                "<td>".$row->firstname."</td>".
                "<td>".$row->lastname."</td>".
                "<td>".$row->username."</td>".
            "</tr>";
    }

    echo "</table>";
} catch(Exception $e) {
    die("Error encountered: ".$e);
}
<?php 


$client = new MongoDB\Client("mongodb://localhost:8899");

$url = $_SERVER["REQUEST_URI"];

$dsn = 'mysql:dbname=user;port=3307;host=127.0.0.1';
$user = 'dbuser';
$password = 'dbpass';


if ($url == "/login") {

    try {
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

    $returndata = array(
        "key" => "data",
        "key2" => array("key2" => "data2")
    );
    echo json_encode($returndata);
}



?>
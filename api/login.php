<?php 

require __DIR__ . '/../db/db.php';

$url = $_SERVER["REQUEST_URI"];

// try {
//     $dbsession = Database::getInstance();
//     $dbsession->insertUser();


// } catch (PDOException $e) {
//     echo 'Connection failed: ' . $e->getMessage();
// }


if ($url == "/login" && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $jsondata = json_decode(file_get_contents('php://input'), true);
    try {
        $dbsession = Database::getInstance();
        $dbsession->findUser();
        $dbsession->insertUser();
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
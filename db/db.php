<?php 

class Database
{
    private static $instance;
    private $client;



    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database;
        }
        return self::$instance;
    }

    private function __construct()
    {

        $this->client = new MongoDB\Client("mongodb://localhost:8899");

    }

    public function insertUser()
    {
        $db = $this->client->swiftline;
        $collection = $db->users;


        $document = array(
            "name" => "sample_name",
            "password" => "sample_password"
        );
        $collection->insertOne($document);
    }

    public function findUser()
    {
        $db = $this->client->swiftline;
        $collection = $db->users;
        $userQuery = array('name' => 'sample_name');


        $users = $collection->find($userQuery);
        foreach ($users as $user) {
            var_dump($user);
        }
    }

}



?>
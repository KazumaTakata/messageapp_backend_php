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

    public function addFriend($myid, $friendid)
    {
        $db = $this->client->swiftline;
        $collection = $db->users;

        $collection->updateOne(
            ["_id" => new MongoDB\BSON\ObjectID($myid)],
            ["$push" => ["friendIds" => new MongoDB\BSON\ObjectID($friendid)]]
        );
    }

    public function insertUser($name, $pass)
    {
        $db = $this->client->swiftline;
        $collection = $db->users;


        $document = array(
            "name" => $name,
            "password" => $pass,
            "photourl" => "http://localhost:8181/img/defaultprofile.png",
            "backgroundurl" => "http://localhost:8181/img/rocco-caruso-722282-unsplash.jpg",
            "friendIds" => [],
            "talks" => [],

        );
        $collection->insertOne($document);
    }

    public function insertFeed($feedcontent, $userid, $photourl)
    {
        $db = $this->client->swiftline;
        $collection = $db->feeds;


        $document = ["feedcontent", $feedcontent, "userid", $userid, "photourl", $photourl];

        $insertresult = $collection->insertOne($document);
    }

    public function insertTalk($friendid, $content, $myid)
    {
        $db = $this->client->swiftline;
        $collection = $db->feeds;

        $insertResult = $collection->updateOne(
            ["_id" => new MongoDB\BSON\ObjectID($myid)],
            ["$push" => ["talks" => ["id" => new MongoDB\BSON\ObjectID($friendid), "content" => $content]]]
        );
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

    public function findOneByName($name)
    {
        $db = $this->client->swiftline;
        $collection = $db->users;

        $Query = ["name", $name];
        $user = $collection->findOne($Query);
        return $user;
    }

    public function findOneById($id)
    {
        $db = $this->client->swiftline;
        $collection = $db->users;

        $Query = ["_id", new MongoDB\BSON\ObjectID($id)];
        $user = $collection->findOne($Query);
        return $user;
    }

    public function find()
    {
        $db = $this->client->swiftline;
        $collection = $db->users;

        $user = $collection->find();
        return $user;
    }

    public function getFeeds()
    {
        $db = $this->client->swiftline;
        $collection = $db->feeds;

        $findresult = $collection->find();

        return $findresult;
    }

    public function RemoveAll()
    {
        $db = $this->client->swiftline;
        $collection = $db->users;

        $deleteResult = $collection->deleteMany();

    }

}



?>
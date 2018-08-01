<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . "/../testsample/testsample.php";

final class loginTest extends TestCase
{

    public function testAddisOk() : void
    {
        // $client = new \GuzzleHttp\Client();
        // $res = $client->post('http://localhost:8000/login', [
        //     GuzzleHttp\RequestOptions::JSON => ['foo' => 'bar']
        // ]);

        // echo $res->getBody();
        $this->assertEquals(add(3, 6), 9);

    }
}

?>
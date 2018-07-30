<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . "/../testsample/testsample.php";

final class loginTest extends TestCase
{

    public function testAddisOk() : void
    {
        $this->assertEquals(add(3, 6), 9);
    }
}

?>
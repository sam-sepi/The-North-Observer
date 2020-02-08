<?php

class Testing extends \PHPUnit\Framework\TestCase
{
    public function testStark()
    {
        $stark = new North\Stark;
        $members = $stark->getMembers();

        $this->assertEquals('Eddard', $members[0]);
    }

    public function testDeaths()
    {
        $deaths = new North\Deaths('deaths.json');
        $array = $deaths->getDeaths();

        $this->assertTrue(is_array($array));
    }
}

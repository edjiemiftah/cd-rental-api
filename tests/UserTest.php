<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    public function testGetAllStocks()
    {
        $response = $this->get('/stocks');
        return $response->seeJsonStructure([
            'data'
        ]);
    }
}
